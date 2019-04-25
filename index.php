 ﻿<?php
session_start();
require 'includes/mysql_connection.php';
require 'includes/config.php';
require 'includes/messages.php';

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
<link rel="stylesheet" href="css/styleSettings.css">

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

  ?>
  <div class="container">
    <!-- password reset success spot-->
    <?php
    if(isset($_GET["newpwd"])){
     if($_GET["newpwd"] == "passwordupdated"){
       ?>
       <div class="message-box">
         <div class="isa_success">
         <i class="fa fa-check"></i>
         Your password has been updated!
       </div>
     </div>
         <?php
     }
    }
    ?>
    <div class="login-box">
    <form method="POST" id="loginForm">
     <h1>Login</h1>
    <div class="textbox">
     <i class="fas fa-user"></i>
    <input type="text" name="username" placeholder="Username"></input>
      </div>
      <div class="textbox">
        <i class="fas fa-lock"></i>

    <input type="password" name="password" placeholder="Password"></input>
      </div>
    <button class="btn" name="submit">Sign In</button>
    </form>
    <div class="login-remind">
       <a href="forgotPassword.php">Forgot your password?</a>

    </div>
  </div>

   <?php
	//Kodas vykdomas po LOGIN paspaudimo

	if(isset($_POST['submit']))
	{
		echo LoginMe($_POST['username'], $_POST['password']);
	}


?>



</body>

</html>
