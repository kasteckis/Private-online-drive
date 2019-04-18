<?php

	function UploadLog($text)
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';

		$userNick = $_SESSION['nick'];
		$userIP = $_SERVER['REMOTE_ADDR'];
		$currentDate = date("Y-m-d H:i:s");
		//0000-00-00 00:00:00
		$sqlInsertToLogs = "INSERT INTO Logs (text, user, ip, date) VALUES ('$text', '$userNick', '$userIP', '$currentDate')";

		if(mysqli_query($conn, $sqlInsertToLogs))
		{
			return true;
		}
		else
		{
			echo "<font color='red'>NEEINA IKELTI I LOGUS. LogsSystem.php!!!! SITOS ZINUTES NETURI BUT!!!</font><br>";
			return false;
		}
	}
?>