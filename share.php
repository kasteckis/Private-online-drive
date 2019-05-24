<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		?>
		<div class="containers">
      <?php
			$page='share';
      include 'includes/navbar.php';
			include 'includes/file-nav.php';
      ?>
			<div class="main">
				<?php
					echo "Choose a user with who you want to share your files and specify date till when your directory will be available to him!<br>";
					$sqlGetUserListWithoutAdmins = "SELECT * FROM Users WHERE status!='admin'";
					$resultsGetUserListWithoutAdmins = mysqli_query($conn, $sqlGetUserListWithoutAdmins);
					if (mysqli_num_rows($resultsGetUserListWithoutAdmins) > 0)
					{
						echo "<form method='POST'>";
						echo "<select name='user'>";
						while($row = mysqli_fetch_assoc($resultsGetUserListWithoutAdmins))
						{
							if($row['id'] == $_SESSION['id']) // kad nerodytu saves liste
								continue;
							echo "<option value='".$row['id']."'>".$row['nick']."</option>";
						}
						echo "</select><br>";
						echo "<input name='dateTillWhen' placeholder='Date till when' value='".date('Y-m-d H:i:s', strtotime('+1 hour'))."'></input><br>";

						echo "<button name='submitShare'>Share files</button>";
						echo "</form>";

						if(isset($_POST['submitShare']))
						{
							$currDate = date('Y-m-d H:i:s');
							$tillWhenDate = mysqli_real_escape_string($conn, $_POST['dateTillWhen']);
							$fileOwnerId = $_SESSION['id'];
							$myId = $_POST['user'];

							$canIInsert = true;

							// VALIDATION ------ (prevents user from double,triple,... sharing files)

							$sqlCheckIfImSharing = "SELECT * FROM SharedFiles WHERE otherId='$myId' AND fileOwnerId='$fileOwnerId' AND tillWhen>'$currDate'";
							$resultsCheckIfImSharing = mysqli_query($conn, $sqlCheckIfImSharing);
							if (mysqli_num_rows($resultsCheckIfImSharing) > 0)
								$canIInsert = false;

							// ---------

							if($canIInsert)
							{
								$sqlInsert = "INSERT INTO SharedFiles (whenCreated, tillWhen, fileOwnerId, otherId) VALUES ('$currDate', '$tillWhenDate', '$fileOwnerId', '$myId')";
								if(mysqli_query($conn, $sqlInsert))
								{
									echo "You have succesfully shared your files!<br>";
								}
								else
								{
									echo "Error!".mysqli_error($conn);
								}
							}
							else
							{
								echo "<font color='red'>You are currently sharing your files with this user!</font><br>";
							}
						}

						$currUserId = $_SESSION['id'];
						$currDate = date('Y-m-d H:i:s');
						$sqlGetUsersWithWhoYouAreSharingFiles = "SELECT nick, tillWhen, SharedFiles.id
																FROM SharedFiles
																JOIN Users ON Users.id=SharedFiles.otherId
																WHERE fileOwnerId='$currUserId' AND
																tillWhen>'$currDate'
																ORDER BY tillWhen";
						$resultsGetUsersWithWhoYouAreSharingFiles = mysqli_query($conn, $sqlGetUsersWithWhoYouAreSharingFiles);
						if (mysqli_num_rows($resultsGetUsersWithWhoYouAreSharingFiles) > 0)
						{
							echo "You are currently sharing files with:<br>";
							echo "<form method='POST'>";
							echo "<table>";
							echo "<tr>";
							echo "<th>User</th>";
							echo "<th>Till when</th>";
							echo "<th>Delete</th>";
							echo "</tr>";
							while($row = mysqli_fetch_assoc($resultsGetUsersWithWhoYouAreSharingFiles))
							{
								echo "<tr>";
								echo "<td>".$row['nick']."</td>";
								echo "<td>".$row['tillWhen']."</td>";
								echo "<td><button name='del".$row['id']."'>X</button></td>";
								echo "</tr>";

								if(isset($_POST['del'.$row['id']]))
								{
									$rowId = $row['id'];
									$sqlDeleteFileShare = "DELETE FROM SharedFiles WHERE id='$rowId'";
									if(mysqli_query($conn, $sqlDeleteFileShare))
									{
										echo "<br>File share was succesfully deleted!<br>";
									}
									else
									{
										echo "ERROR".mysqli_error($conn);
									}
								}
							}
							echo "</table>";
							echo "</form>";
						}
						else
						{
							echo "You are not sharing your files with any user!<br>";
						}
					}
					else
					{
						echo "There are no available users!<br>";
					}
				?>
			</div>
		</div>
		<?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
