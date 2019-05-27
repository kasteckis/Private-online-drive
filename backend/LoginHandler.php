<style>
	.login-error {
		color:white;
		margin-top: 3%;
		text-align: center;
	}
</style>

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
		require 'backend/LogsSystem.php';
		
		$userIP = $_SERVER['REMOTE_ADDR'];
		$currentDate = date('Y-m-d H:i:s');
		$isUserIPBanned = false;

		$sqlCheckIfImNotBanned = "select * from BadLogins WHERE ip='$userIP'";
		$resultsCheckIfImNotBanned = mysqli_query($conn, $sqlCheckIfImNotBanned);
		if (mysqli_num_rows($resultsCheckIfImNotBanned) > 0)
		{
			while($row = mysqli_fetch_assoc($resultsCheckIfImNotBanned))
			{
				if($row['bannedTill'] > $currentDate)
				{
					$isUserIPBanned = true;
					break;
				}
			}
		}

		if($isUserIPBanned)
		{
			echo "<h1 class='login-error'>You are not able to connect till ".$row['bannedTill']."</h1>";
		}
		else
		{
			$username = mysqli_real_escape_string($conn, $a); //Nuo sql injection
			$password = mysqli_real_escape_string($conn, $b); //Nuo sql injection
			$sqlGetUserInformation = "SELECT * FROM Users WHERE nick='$username'";
			$getUserInformationResults = mysqli_query($conn, $sqlGetUserInformation);

			if (mysqli_num_rows($getUserInformationResults) > 0)
			{
		  		// output data of each row
			    while($row = mysqli_fetch_assoc($getUserInformationResults))
			    {
			    	if($row['suspended'] == 1)
			    	{
			    		echo "<h1 class='login-error'><font color='red' size='5'><b>Your account is suspended by administrator!"."</b></font></h1><br>";
			    		break;
			    	}
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

						$sqlUpdateUserLastLoggedDate = "UPDATE Users SET lastLogged='$currentDate' WHERE id='$tempId'";
						mysqli_query($conn, $sqlUpdateUserLastLoggedDate);
						$sqlDelete = "delete from BadLogins where ip='$userIP'";
						mysqli_query($conn, $sqlDelete);
						header('Location: /manager');
						return $welcome.", ".$row['nick']."!<br>";
					}
					else
					{
						// ---

						if($a != null && $b != null)
						{
							$userIP = $_SERVER['REMOTE_ADDR'];
							$currentTime = date("Y-m-d H:i:s");
							$tries = 1;
							$sqlRead = "select * from BadLogins";
							$doesTheIPExist = false;
							$result = mysqli_query($conn, $sqlRead);
							if (mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_assoc($result))
								{
									if($userIP == $row['ip'])
									{
										$tries = $row['tries'];
										$tries++;
										$doesTheIPExist = true;
										break;
									}
								}
							}
							if($doesTheIPExist)
							{
								if($tries >= $MaximumTriesWhileLogging)
								{
									$newBanDate = date("Y-m-d H:i:s", strtotime($currentTime.'+ '.$BanLength.' minutes'));
									$sqlUpdate = "update BadLogins SET tries='$tries', bannedTill='$newBanDate', lastLogin='$currentTime' where ip='$userIP'";
									//Logu struktura: "User (IP) did ..."
									$logText = "User (".$userIP.") just got banned until ".$newBanDate;
									UploadLog($logText);
									echo "<h1 class='login-error'><font color='red' size='5'><b>You have been banned!</b></font></h1><br>";
								}
								else
								{
									//Logu struktura: "User (IP) did ..."
									$logText = "User (".$userIP.") tried to connect with incorrect logins into system. He used his ".$tries." tries";
									UploadLog($logText);
									$sqlUpdate = "update BadLogins SET tries='$tries', lastLogin='$currentTime' where ip='$userIP'";
								}
								mysqli_query($conn, $sqlUpdate);
							}
							else
							{
								$sqlInsert = "insert into BadLogins(ip, tries, lastLogin) VALUES ('$userIP','$tries', '$currentTime')";
								mysqli_query($conn, $sqlInsert);
								//Logu struktura: "User (IP) did ..."
								$logText = "User (".$userIP.") tried to connect with incorrect logins into system. He used his ".$tries." tries";
								UploadLog($logText);
							}
							echo "<h1 class='login-error'><font color='red' size='5'><b>You weren't connected to the system. You used $tries of ".$MaximumTriesWhileLogging." attempts."."</b></font></h1><br>";
							return null;
						}

						// ---
						echo "<h1 class='login-error'>".$wrongPassword."</h1>";
						//return "Blogas slaptažodis<br>";
						return null;
					}
			    }
			}
			else
			{
				//Tas pats lyg įvestas blogas slaptažodis.
				UploadLog("Tried to connect to non-existant ".$username." account!");
				echo "<h1 class='login-error'>".$wrongUser."</h1>";
				//return "Nerastas vartotojas<br>";
				return null;
			}
		}


	}
?>
