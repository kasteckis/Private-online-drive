<?php
	function LoginMe($a, $b) //nick, psw
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';

		$username = mysqli_real_escape_string($conn, $a); //Nuo sql injection
		$password = mysqli_real_escape_string($conn, $b); //Nuo sql injection
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
					return "Blogas slaptažodis<br>";
				}
		    }
		}
		else
		{
			//Tas pats lyg įvestas blogas slaptažodis.
			return "Nerastas vartotojas<br>";
		}
	}
?>