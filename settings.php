<?php
session_start();
require 'includes/mysql_connection.php';
require 'includes/config.php';

//Includins visus skriptus is backendo, nežinau ar funkcijas į vieną .php failą kraut ar į atskirus
foreach(glob("backend/*.php") as $back)
{
    require $back;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $WebsiteTitle; ?></title>
<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" /> 
<link rel="stylesheet" href="css/styleSettings.css"> 

</head>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{?>
		<div class="background">
			<div class="back">
				<?php
				//Mygtukas atgal
				echo '<form action="/manager">'; 
				echo '<input type="submit" value="Back" />';
				echo '</form>'; 
				?>
			</div>

			<div class="changebox">
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



</body>

</html>
