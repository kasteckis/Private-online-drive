<?php
  require 'includes/mysql_connection.php';
  require 'includes/config.php';
	require 'backend/PasswordReset/CreatePassword.php';
  require 'includes/messages.php';
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
		<div class="background">
			<div class="back">
				<!--Mygtukas atgal-->
				<form action="/index">
				<input type="submit" value="Back" />
				</form>
			</div>

      <?php

        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector)  || empty($validator)){
          echo "Could not validate your request";
        }else{
          if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
            ?>
            <div class="changebox">
              <h3>Change your password</h3>
              <form method="POST">
                <div class="inputs">
                  <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                  <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                  <input type="password" name="pwd" placeholder="Enter a new password..." required></input>
                  <input type="password" name="pwd-repeat" placeholder="Repeat new password..." required></input>
                  <button type="submit" name="reset-password-submit">Reset password</button>
                </div>
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
		</div>
</body>

</html>
