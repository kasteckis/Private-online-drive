 ﻿<?php
session_start();
require 'includes/mysql_connection.php';
require 'includes/config.php';
require 'includes/messages.php';
require 'backend/LoginHandler.php';
require 'backend/PasswordReset/ResetPassword.php';
require 'backend/PasswordReset/CreatePassword.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $WebsiteTitle; ?></title> <!-- Globalus kintamasis keičiamas per includes/config.php -->
<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
  <div class="container">

    <?php
    if(isset($_GET["reset"])){
     if($_GET["reset"] == "success"){
       ?>
       <div class="message-box">
         <div class="isa_success">
         <i class="fa fa-check"></i>
         <?php echo $emailRecoverySent; ?>
       </div>
     </div>
         <?php
     } elseif($_GET["reset"] == "wrongemail"){
       ?>
       <div class="message-box">
         <div class="isa_error">
         <i class="fa fa-times-circle"></i>
         <?php echo $emailRecoveryBadEmail; ?>
       </div>
     </div>
         <?php
     }elseif($_GET["reset"] == "passwordupdated"){
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


    <!-- password reset success spot-->
    <?php
    if(isset($_GET["action"])){
     if($_GET["action"] == "forgotpassword"){
      ?>
      <div class="login-box">
        <h1><?php echo "$emailRecoveryGreeting"; ?></h1>
        <h4><?php echo $emailRecoveryInstructions; ?></h4>
        <form method="POST">
        <div class="textbox">
         <i class="fas fa-envelope-open"></i>
        <input type="text" name="email" placeholder="Enter your e-mail address.." required></input>
          </div>
        <button type="submit" class="btn-textbox" name="reset-request-submit"><?php echo $emailRecoveryPassword; ?></button>
        </form>
        <div class="login-remind">
           <a href="index">Login</a>

        </div>
      </div>
        <?php
        if(isset($_POST['reset-request-submit']))
        {
          if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $userInput = mysqli_real_escape_string($conn, $_POST['email']); //padariau apsauga nuo sql injection -Valentinas
              echo ResetPassword($userInput);
          }
          else {
              header("Location: ./index?action=forgotpassword&reset=wrongemail");
          }
        }
    }elseif($_GET["action"] == "createnewpassword"){



        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector)  || empty($validator)){
          echo "Could not validate your request";
        }else{
          if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
            ?>
            <div class="login-box">
              <h1>Create new password</h1>
              <form method="POST">
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
              <div class="textbox">
              <input type="password" name="pwd" placeholder="Enter a new password..." required></input>
                </div>
                <div class="textbox">
                <input type="password" name="pwd-repeat" placeholder="Repeat new password..." required></input>
                  </div>
              <button type="submit" class="btn-textbox" name="reset-password-submit">Create</button>
              </form>
            <?php
          }
        }

        if(isset($_POST['reset-password-submit']))
        {
          $userSelector = mysqli_real_escape_string($conn, $_POST['selector']);
          $userValidator = mysqli_real_escape_string($conn, $_POST['validator']);
          $userPwd = mysqli_real_escape_string($conn, $_POST['pwd']);
          $userPwdRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
          echo CreatePassword($userSelector, $userValidator, $userPwd, $userPwdRepeat);
        }
        ?>
      </div>
      <?php
    }
  } else{
    ?>
    <div class="login-box">
    <form method="POST" id="loginForm">
     <h1>Login</h1>
    <div class="textbox">
     <i class="fas fa-user"></i>
    <input type="text" name="username" placeholder="Username" required></input>
      </div>
      <div class="textbox">
        <i class="fas fa-lock"></i>

    <input type="password" name="password" placeholder="Password" required></input>
      </div>
    <button class="btn-textbox" name="submit">Sign In</button>
    </form>
    <div class="login-remind">
       <a href="?action=forgotpassword">Forgot your password?</a>

    </div>
  </div>
   <?php
  }


	//Kodas vykdomas po LOGIN paspaudimo

	if(isset($_POST['submit']))
	{
		echo LoginMe($_POST['username'], $_POST['password']);
	}


?>



</body>

</html>
