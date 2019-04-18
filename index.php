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
<title><?php echo $WebsiteTitle; ?></title> <!-- Globalus kintamasis keičiamas per includes/config.php -->
<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
<link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php
	//Users : id, nick, status(admin/user) ,password (hashed), suspended (1/0), lastLogged


	//Root slaptažodis duomenų bazėje (hashed): $2y$10$/XqDBv6/I.4o.0slXEKskO1wu/JOiKII8qBNNlgYb76yHXBE7p4/q

	//$hashedPassword = password_hash("devbridge321", PASSWORD_DEFAULT); //veliau man reiks



	//debuginimo tikslams
	// echo "<font color='red'>Sesijos duomenys<br>";
	// echo "id: ".$_SESSION['id']."<br>";
	// echo "nick: ".$_SESSION['nick']."<br>";
	// echo "status: ".$_SESSION['status']."<br>";
	// echo "password: ".$_SESSION['password']."<br>";
	// echo "suspended: ".$_SESSION['suspended']."<br>";
	// echo "lastLogged: ".$_SESSION['lastLogged']."</font><br>";


	echo '<form method="POST" id="loginForm">';
	echo '<div class="login-box">';
	echo ' <h1>Login</h1>';
	echo '<div class="textbox">';
	echo ' <i class="fas fa-user"></i>';
	echo '<input type="text" name="username" placeholder="Username"></input>';
	echo '  </div>';
	echo '  <div class="textbox">';
	echo '    <i class="fas fa-lock"></i>';

	echo '<input type="password" name="password" placeholder="Password"></input>';
	echo '  </div>';
	echo '<button class="btn" name="submit">Sign In</button><br>';
	echo '</div>';
	echo '</form>';

	//Kodas vykdomas po LOGIN paspaudimo

	if(isset($_POST['submit']))
	{ 
		echo LoginMe($_POST['username'], $_POST['password']);
	}


?>



</body>

</html>
