<?php
	$dbServer = "localhost";
	$dbUsername = "galgaldas_devbridge";
	$dbPassword = "devbridge321";
	$dbName = "galgaldas_devbridge";
	$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
	
	if($conn == false)
	{
		die("Connection to database was incorrect! You should check includes/mysql_connection.php file and renew your information!<br>".mysqli_connect_error());
	}
?>