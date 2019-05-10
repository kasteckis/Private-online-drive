<?php
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
		echo "Your password have been changed!<br>";
		$_SESSION['id'] = null;
		$_SESSION['nick'] = null;
		$_SESSION['status'] = null;
		$_SESSION['password'] = null;
		$_SESSION['suspended'] = null;
		$_SESSION['lastLogged'] = null;

		header('Location: /index');
	}
?>