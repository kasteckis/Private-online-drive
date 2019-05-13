<?php
	require 'backend/DefaultSessions.php'; //kartais meta warningus, todel reiktu sita parequirint
	$tempUserNick = $_SESSION['nick'];
	$userPasswordInDB = null;
	$sqlGetCurrentUser = "SELECT * FROM Users where nick='$tempUserNick'";
	$resultsGetCurrentUser = mysqli_query($conn, $sqlGetCurrentUser);
	while($row = mysqli_fetch_assoc($resultsGetCurrentUser))
	{
		$userPasswordInDB = $row['password'];
	}

	if($_SESSION['password'] != $userPasswordInDB)
	{
		echo "Your password has been changed!<br>";
		$_SESSION['id'] = null;
		$_SESSION['nick'] = null;
		$_SESSION['status'] = null;
		$_SESSION['password'] = null;
		$_SESSION['suspended'] = null;
		$_SESSION['lastLogged'] = null;

		header('Location: /index');
	}
?>