<?php
  require 'includes/mysql_connection.php';
  require 'includes/config.php';
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

			<div class="changebox">
				<h3>Write your email to recover your password</h3> <!-- $emailRecovery-->
				<form method='POST'>
				<div class="inputs">
          <input type='text' name='email' placeholder='Email' required></input>
					<button name='submitEmail'>Forgot password</button> <!-- $emailPasswordRecovery -->
				</div>
      </form>
			</div>
		</div>

		<?php

    if(isset($_POST) & !empty($_POST)){
    	$username = mysqli_real_escape_string($conn, $_POST['username']);
    	$sql = "SELECT * FROM `Users` WHERE nick = '$username'";
    	$res = mysqli_query($conn, $sql);
    	$count = mysqli_num_rows($res);
    	if($count == 1){
    		echo "Send email to user with password";
    	}else{
    		echo "User name does not exist in database";
    	}
    }

      $r = mysqli_fetch_assoc($res);
      $password = $r['password'];
      $to = $r['email'];
      $subject = "Your Recovered Password";

      $message = "Please use this password to login " . $password;
      $headers = "From : tidish@inbox.lt";
      if(mail($to, $subject, $message, $headers)){
      	echo "Your Password has been sent to your email id";
      }else{
      	echo "Failed to Recover your password, try again";
      }

?>

</body>

</html>
