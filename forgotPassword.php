<?php
  require 'includes/mysql_connection.php';
  require 'includes/config.php';
  require 'includes/messages.php';
  require 'backend/PasswordReset/ResetPassword.php';
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
       <form action="/index">
				<input type="submit" value="Back" />
				</form>

			</div>

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
         }
        }
        ?>

			<div class="changebox">
				<h2><?php echo $emailRecovery; ?></h2>
        <h4><?php echo $emailRecoveryInstructions; ?></h4>
				<form method='POST'>
				<div class="inputs">
          <input type="text" name="email" placeholder="Enter your e-mail address.." required></input>
					<button type="submit" name="reset-request-submit"><?php echo $emailRecoveryPassword; ?></button>
				</div>
      </form>
      <?php
      if(isset($_POST['reset-request-submit']))
      {
        echo ResetPassword($_POST['email']);
      }
      ?>
			</div>
		</div>
</body>

</html>
