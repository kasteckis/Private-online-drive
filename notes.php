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
      include 'includes/navbar.php';
      ?>

			<div class="main">
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
					echo "<button name='update'>Update</button>";
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
