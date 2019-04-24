<?php

	function Logout()
	{
		$_SESSION['id'] = null;

		$_SESSION['nick'] = null;

		$_SESSION['status'] = null;

		$_SESSION['password'] = null;

		$_SESSION['suspended'] = null;

		$_SESSION['lastLogged'] = null;

		header('Location: /index');

		return true;
	}

	function LoginMe($a, $b) //nick, psw
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';
		require 'includes/messages.php';
		//require 'backend/LogsSystem.php';

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
					header('Location: /manager');
					return $welcome.", ".$row['nick']."!<br>";
				}
				else
				{
					UploadLog("Tried to connect to ".$username." account and failed!");
					echo "<h1 id='wrongpass' style='color:white; margin-top: 3%; text-align: center;'>".$wrongPassword."</h1>";
					//return "Blogas slaptažodis<br>";
					return null;
				}
		    }
		}
		else
		{
			//Tas pats lyg įvestas blogas slaptažodis.
			UploadLog("Tried to connect to non-existant ".$username." account!");
			echo "<h1 id='not-found' style='color:white; margin-top: 3%; text-align: center;'>".$wrongUser."</h1>";
			//return "Nerastas vartotojas<br>";
			return null;
		}
	}
?>
