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
<link rel="icon" href="favicon.png" type="image/png" sizes="16x16"> 
<!--<link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		//Mygtukas atgal
		echo '<form action="/usermanager">';
	    echo '<input type="submit" value="Back" />';
		echo '</form><br><br>';

		echo "<b>Create new user</b><br>";
		echo '<form method="POST">';
		echo '<input type="text" name="nick" placeholder="Nickname"></input><br>';
		echo '<select name="role">';
		echo '<option value="user">User</option>';
		echo '<option value="admin">Admin</option>';
		echo '</select><br>';
		echo '<input type="password" name="password" placeholder="Pasword"></input><br>';
		echo "<button type='submit' name='createNewUser'>Create</button><br>";
		echo '</form>';

		if(isset($_POST['createNewUser']))
		{
			//Validacija
			$canICreateUser = true;
			$validationErrors = array();
			$nick = mysqli_real_escape_string($conn, $_POST['nick']);
			$status = mysqli_real_escape_string($conn, $_POST['role']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$suspended = 0;
			$lastLogged = date("0000-00-00 00:00");

			echo "psw: ".$password."<br>";
			echo "psw: ".$hashedPassword."<br>";

			if($nick == null)
			{
				array_push($validationErrors, "Nickname is empty");
				$canICreateUser = false;
			}

			if($password == null)
			{
				array_push($validationErrors, "Password is empty");
				$canICreateUser = false;
			}

			if($canICreateUser)
			{
				//TODO: Padaryt kad sukurtu useri
				echo "ale sukuria useri";
			}
			else
			{
				foreach ($validationErrors as $key => $value)
				{
					echo "<font color='red'>".$value."</font><br>";
				}
			}
		}
	}
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
