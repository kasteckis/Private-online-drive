<?php
  require 'includes/mysql_connection.php';
  require 'includes/config.php';
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

      <div class="box-success">
        <?php if(isset($_GET["reset"])){
          if($_GET["reset"] == "success"){
            ?> <p>
              Check your email
            </p> <?php
          }
        }
          ?>
      </div>

			<div class="changebox">
				<h3>Write your email address to recover your password</h3> <!-- $emailRecovery-->
        <h2>An email will be sent to you with instructions on how to reset your password</h2>
				<form action="backend/PasswordReset/ResetPassword.php" method='POST'>
				<div class="inputs">
          <input type='text' name='email' placeholder='Enter your e-mail address..' required></input>
					<button type="submit" name='reset-password-submit'>Forgot password</button> <!-- $emailPasswordRecovery -->
				</div>
      </form>

			</div>
		</div>
</body>

</html>
