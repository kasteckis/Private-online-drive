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
      include 'includes/navbar.php';
		$sqlGetMember = "SELECT * FROM Users WHERE id=".$_SESSION['editableUser'];
		$resultGetMember = mysqli_query($conn, $sqlGetMember);
		$doesUserExist = false;
		$userID = null;
		$oldNick = null;
		$oldHashedPassword = null;
	    while($row = mysqli_fetch_assoc($resultGetMember))
	    {
	        $doesUserExist = true;
	        $userID = $row['id'];
	        $oldNick = $row['nick'];
	        $oldHashedPassword = $row['password'];
          echo '<div class="changebox">';
	        echo "<form method='POST'>";
	        echo "ID: ".$row['id']."<br>";
	        echo "<input name='nick' placeholder='nickname' value=".$row['nick']."></input><br>";
	        echo "<input name='email' placeholder='Email' value=".$row['email']."></input><br>";
	        echo "<input type='password' name='password' placeholder='password'></input> If not changed, password will stay the same<br>";
	        echo "<select name='status'>";
	        echo "<option value='user'>User</option>";
	        if($row['status'] == "user")
	        	echo "<option value='admin'>Admin</option>";
	        else
	        	echo "<option value='admin' selected>Admin</option>";
	        echo "</select><br>";
	        echo "<select name='suspended'>";
	        if($row['suspended'] == "0")
	        {
	        	echo "<option value='0'>Not suspended</option>";
	        	echo "<option value='1'>Suspended</option>";
	        }
	        else
	        {
	        	echo "<option value='0'>Not suspended</option>";
	        	echo "<option value='1' selected>Suspended</option>";
	        }
	        echo "</select><br>";
	        echo "<button name='edit-user-submit' class='changebox-button'>Edit</button><br>";
	        echo "</form>";
	    }
		if(!$doesUserExist)
		{
		    echo "ERROR. User does not exist!<br>"; //klaida kurios neturetu buti niekada, bet del viso pikto
		}
		if(isset($_POST['edit-user-submit']))
		{
			// echo $userID."<br>";
			// echo $_POST['nick']."<br>";
			// echo $_POST['password']."<br>";
			// echo $_POST['suspended']."<br>";
			$newNick = mysqli_real_escape_string($conn, $_POST['nick']);
			$newPassword = mysqli_real_escape_string($conn, $_POST['password']);
			$newSuspension = mysqli_real_escape_string($conn, $_POST['suspended']);
			$newStatus = mysqli_real_escape_string($conn, $_POST['status']);
			$newEmail = mysqli_real_escape_string($conn, $_POST['email']);
			$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //encryptinimas
			//VALIDACIJA
			$validationAccepted = true;
			// reiskia naudojam sena slaptazodi
			if(strlen($newPassword) == 0)
			{
				$hashedPassword = $oldHashedPassword;
			}
			//Jeigu yra keiciamas userio nick, butina patikrinti ar kitokiu tokiu nera
			if($oldNick != $newNick)
			{
				$sqlGetUsersForValidation = "SELECT * FROM Users WHERE nick='".$newNick."'";
				$resultsUsersForValidation = mysqli_query($conn, $sqlGetUsersForValidation);
				if(mysqli_num_rows($resultsUsersForValidation) > 0)
				{
					//tai reiskia kad egzistuoja daugiau nei 0 useriu su pasirinktu nicku, todel tai draudziama
					$validationAccepted = false;
				}
			}
			// ----- VALIDACIJOS PABAIGA
			if($validationAccepted)
			{
				$sqlUpdate = "UPDATE Users SET nick='$newNick', password='$hashedPassword', status='$newStatus', suspended='$newSuspension', email='$newEmail' WHERE id='$userID'";
				if(mysqli_query($conn, $sqlUpdate))
				{
					rename("./files/".$oldNick, "./files/".$newNick);
					echo "User has been succesfully edited!<br>";
					UploadLog("User ".$newNick." was edited!");
				}
			}
			else
			{
				echo "<font color='red'>VALIDATION ERROR!</font><br>";
			}
		}
    echo '</div>';
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}
?>
</div>


</body>

</html>