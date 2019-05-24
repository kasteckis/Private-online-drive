<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{?>
		<div class="container">

      <?php
			$page='settings';
      include 'includes/navbar.php';
			include 'includes/file-nav.php';
      ?>

			<div class="sub-page-main">
				<div class="display-menu">
					<!-- Or delete just the button if no buttons on the page -->
					<button class="btn-display-menu" type='submit' name='dosmth' ><i class="fas fa-trash-alt"></i> button example</button>
				</div>
			<div class="main">
				<?php
				echo "<h3>Change password:</h3>";
				echo "<form method='POST'>";?>
				<div class="inputs">
					<?php
					echo "<input type='password' name='currPass' placeholder='Current Password'></input>";
					echo "<input type='password' name='newPass1' placeholder='New Password'></input>";
					echo "<input type='password' name='newPass2' placeholder='Repeat new password'></input>";
					echo "<button name='submitChange'>Change Password</button>";
					?>
				</div>
				<div class="inputs">

				<?php
					$currentNick = $_SESSION['nick'];
					$currentEmail = null;
					$sqlGetEmail = "SELECT email FROM Users WHERE nick='$currentNick'";
					$resultsGetEmail = mysqli_query($conn, $sqlGetEmail);

					if (mysqli_num_rows($resultsGetEmail) > 0)
					{
						while($row = mysqli_fetch_assoc($resultsGetEmail))
						{
							$currentEmail = $row['email'];
							break;
						}
					}

					echo "<h3>Change email:</h3>";
					echo "<input type='text' name='currEmail' placeholder='Your email' value='".$currentEmail."'></input>";
					echo "<button name='submitChangeEmail'>Change Email</button>";
					echo "</form>";
				?>
				</div>
		</div>
	</div>

		<?php
		if(isset($_POST['submitChange']))
		{
			$currentPasswordInput = mysqli_real_escape_string($conn, $_POST['currPass']);
			$newPasswordInput1 = mysqli_real_escape_string($conn, $_POST['newPass1']);
			$newPasswordInput2 = mysqli_real_escape_string($conn, $_POST['newPass2']);

			// root pass $2y$10$/XqDBv6/I.4o.0slXEKskO1wu/JOiKII8qBNNlgYb76yHXBE7p4/q

			if(password_verify($currentPasswordInput, $_SESSION['password']))
			{
				if($newPasswordInput1 == $newPasswordInput2)
				{
					$hashedNewPassword = password_hash($newPasswordInput1, PASSWORD_DEFAULT);
					$currUserId = $_SESSION['id'];
					$changePasswordSql = "UPDATE Users SET password='$hashedNewPassword' WHERE id='$currUserId'";
					if(mysqli_query($conn, $changePasswordSql))
					{
						echo "Your password was successfully changed!<br>";
					}
					else
					{
						echo "ERROR.<br>"; // niekada neturetu but
					}
				}
				else
				{
					echo "Your new passwords does not match!<br>";
				}
			}
			else
			{
				echo "Your old password is wrong!<br>";
			}
		}

		if(isset($_POST['submitChangeEmail']))
		{
			$userNewEmail = mysqli_real_escape_string($conn, $_POST['currEmail']);
			$sqlChangeUsersEmail = "UPDATE Users SET email='$userNewEmail' WHERE nick='$currentNick'";
			if(mysqli_query($conn, $sqlChangeUsersEmail))
			{
				echo "Your email has been changed!<br>";
			}
			else
			{
				echo "ERROR!"; //niekad neturetu but
			}
		}
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>


</div>
</body>

</html>
