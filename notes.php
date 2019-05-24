<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		?>
		<div class="container">

      <?php
			$page='notes';
      include 'includes/navbar.php';
			include 'includes/file-nav.php';
      ?>

			<div class="main">
				<div class="display-menu">
					<button id="Click" class="btn-display-menu" type='submit' name='delete' onclick="DoFunction()"><i class="fas fa-trash-alt"></i> Delete selected</button>

				</div>
				<?php
				$userId = $_SESSION['id'];
				$sqlGetUsersNote = "SELECT * FROM Users WHERE id='$userId'";
				$resultsGetUsersNote = mysqli_query($conn, $sqlGetUsersNote);
				$row = mysqli_fetch_assoc($resultsGetUsersNote);
				?>
				<div class="note">
					<?php
					echo "<form method='POST'>";
					echo '<textarea rows="15" cols="50" name="note">';
					echo $row['note'];
					echo '</textarea>';
					echo "<button name='update'>Update</button><br><br>";
					echo "<button name='save'>Save note in directory</button>";
					echo "<input name='fileName' value='note".date("Y-m-d")."' placeholder='Note file name'></input>";
					echo "</form>";
					?>
				</div>
				<?php
				if(isset($_POST['update']))
				{
					$newNote = mysqli_real_escape_string($conn, $_POST['note']);
					$updateNote = "UPDATE Users SET note='$newNote' WHERE id='$userId'";
					if(mysqli_query($conn, $updateNote))
					{
						echo "Updated succesfully!<br>";
						echo '<meta http-equiv="refresh" content="0;" />';
					}
					else
					{
						echo "ERROR."; //niekada neturetu buti
					}
				}

				if(isset($_POST['save']))
				{
					$fileName = mysqli_real_escape_string($conn, $_POST['fileName']);
					$myfile = fopen("./files/".$_SESSION['nick']."/".$fileName.".txt", "w");
					$txt = mysqli_real_escape_string($conn, $_POST['note']);
					fwrite($myfile, $txt);
					fclose($myfile);
					echo "File was created in your directory with the name ".$fileName.".txt !<br>";

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
