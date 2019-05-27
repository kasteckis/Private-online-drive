<?php

	function CreateUser($nick, $status, $hashedPassword, $suspended, $lastLogged, $email)
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';

		$sqlCreatNewUser = "insert into Users (nick, status, password, suspended, lastLogged, email) VALUES ('$nick', '$status', '$hashedPassword', '$suspended', '$lastLogged', '$email')";
		UploadLog("New user was created with nickaname ".$nick."!");
		mysqli_query($conn, $sqlCreatNewUser);
		mkdir("./files/".$nick);
		return;
	}

	function CheckForValidation($nick, $status, $password, $hashedPassword, $suspended, $lastLogged)
	{
		require 'includes/mysql_connection.php';
		require 'includes/config.php';

		$validationErrors = array();

		$sqlGetConflictedUsers = "SELECT * FROM Users WHERE nick='$nick'";
		$resultsGetConflictedUsers = mysqli_query($conn, $sqlGetConflictedUsers);
	    while($row = mysqli_fetch_assoc($resultsGetConflictedUsers))
	    {
	    	array_push($validationErrors, "Nickname already exists");
	    }


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

	function delete_directory($dirname)
	{
		$dir_handle = false;
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
	}

?>
