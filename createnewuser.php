<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		?>
		<div class="container">

      <?php
			$page='usermanager';
      include 'includes/navbar.php';
      ?>

			<div class="box">
				<?php
				echo "<h3>Create new user</h3>";
				echo '<form method="POST">';?>
				<div class="inputs">
					<?php
					echo '<input type="text" name="nick" placeholder="Nickname*"></input><br>';
					echo '<select name="role">';
					echo '<option value="user">User</option>';
					echo '<option value="admin">Admin</option>';
					echo '</select>';
					echo '<input type="password" name="password" placeholder="Pasword*"></input>';
					echo '<input type="text" name="email" placeholder="E-mail"></input>';
					echo "<button type='submit' name='createNewUser'>Create</button>"; ?>
				</div>
				<?php
				echo '</form>';

				if(isset($_POST['createNewUser']))
				{
					//Validacija
					$canICreateUser = true;

					$nick = mysqli_real_escape_string($conn, $_POST['nick']);
					$status = mysqli_real_escape_string($conn, $_POST['role']);
					$password = mysqli_real_escape_string($conn, $_POST['password']);
					$email = mysqli_real_escape_string($conn, $_POST['email']);
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					$suspended = 0;
					$lastLogged = date("0000-00-00 00:00");

					$validationErrors = CheckForValidation($nick, $status, $password, $hashedPassword, $suspended, $lastLogged);

					if(empty($validationErrors))
					{
						CreateUser($nick, $status, $hashedPassword, $suspended, $lastLogged, $email); //UserManagement.php
						echo "Account with name ".$nick." was created!<br>";
						echo '<meta http-equiv="refresh" content="0; url=./usermanager" />';
					}
					else
					{
						foreach ($validationErrors as $key => $value)
						{
							echo "<font color='red'>".$value."</font><br>";
						}
					}
				}?>
			</div>
		</div>
		<?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
