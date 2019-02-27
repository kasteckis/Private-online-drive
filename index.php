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
<?php
	echo "<title>".$WebsiteTitle."</title>" // Globalus kintamasis keičiamas per includes/config.php
?>
<link rel="icon" href="favicon.png" type="image/png" sizes="16x16"> <!-- Vėliau sukursim tą favicon, gal necrashins -->
</head>

<body>
<?php
	//TODO: Login sistema
	//Users : id, nick, status(admin/user) ,password (hashed), suspended (1/0), lastLogged


	//Root slaptažodis duomenų bazėje (hashed): $2y$10$/XqDBv6/I.4o.0slXEKskO1wu/JOiKII8qBNNlgYb76yHXBE7p4/q
	
	//$hashedPassword = password_hash("devbridge321", PASSWORD_DEFAULT); //veliau man reiks



	//debuginimo tikslams
	echo "Sesijos duomenys<br>";
	echo "id: ".$_SESSION['id']."<br>";
	echo "nick: ".$_SESSION['nick']."<br>";
	echo "status: ".$_SESSION['status']."<br>";
	echo "password: ".$_SESSION['password']."<br>";
	echo "suspended: ".$_SESSION['suspended']."<br>";
	echo "lastLogged: ".$_SESSION['lastLogged']."<br>";

	echo '<form method="POST" id="loginFormt">';
	echo '<input type="text" name="username" placeholder="Username"></input><br>';
	echo '<input type="password" name="password" placeholder="Password"></input><br>';
	echo '<button id="btn" name="submit">Login</button><br>';
	echo '</form>';

	//Kodas vykdomas po LOGIN paspaudimo
	if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['username']); //Nuo sql injection
		$password = mysqli_real_escape_string($conn, $_POST['password']); //Nuo sql injection
		$sqlGetUserInformation = "SELECT * FROM Users WHERE nick='$username'"; 
		$getUserInformationResults = mysqli_query($conn, $sqlGetUserInformation);

		if (mysqli_num_rows($getUserInformationResults) > 0)
		{
	  		// output data of each row
		    while($row = mysqli_fetch_assoc($getUserInformationResults))
		    {
				if(password_verify($password, $row['password']))
				{
					echo "Sveiki atvykę, ".$row['nick']."!<br>";
					$_SESSION['id'] = $row['id'];
					$_SESSION['nick'] = $row['nick'];
					$_SESSION['status'] = $row['status'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['suspended'] = $row['suspended'];
					$_SESSION['lastLogged'] = $row['lastLogged'];

					//Atnaujina kada paskutini kartą buvo jungtasi.
					$tempId = $row['id'];
					$currentDate = date('Y-m-d H:i:s');

					$sqlUpdateUserLastLoggedDate = "UPDATE Users SET lastLogged='$currentDate' WHERE id='$tempId'";
					mysqli_query($conn, $sqlUpdateUserLastLoggedDate);
				}
				else
				{
					echo "Blogas slaptažodis<br>";
				}
		    }
		}
		else
		{
			//Tas pats lyg įvestas blogas slaptažodis.
			echo "Nerastas vartotojas<br>";
		}

	}


?>

</body>


</html>