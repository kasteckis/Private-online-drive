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
<!--<link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		//Mygtukas atgal
		echo '<form action="/manager">';
	    echo '<input type="submit" value="Back" />';
		echo '</form><br><br>';

		echo "Change password:<br>";
		echo "<form method='POST'>";
		echo "<input type='password' name='currPass' placeholder='Current Password'></input><br>";
		echo "<input type='password' name='newPass1' placeholder='New Password'></input><br>";
		echo "<input type='password' name='newPass2' placeholder='Repeat new password'></input><br>";
		echo "<button name='submitChange'>Change Password</button>";
		echo "</form>";

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
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
