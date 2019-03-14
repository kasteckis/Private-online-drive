<?php

	function CreateUser($nick, $status, $hashedPassword, $suspended, $lastLogged)
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';

		$sqlCreatNewUser = "insert into Users (nick, status, password, suspended, lastLogged) VALUES ('$nick', '$status', '$hashedPassword', '$suspended', '$lastLogged')";
		mysqli_query($conn, $sqlCreatNewUser);
		mkdir("./files/".$nick);
		return;
	}

	function CheckForValidation($nick, $status, $password, $hashedPassword, $suspended, $lastLogged)
	{
		$validationErrors = array();



		if($nick == null)
		{
			array_push($validationErrors, "Nickname is empty");
			$canICreateUser = false;
		}

		if($password == null)
		{
			array_push($validationErrors, "Password is empty");
			$canICreateUser = false;
		}

		return $validationErrors;
	}

?>