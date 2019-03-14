<?php
session_start();
require 'includes/mysql_connection.php';
require 'includes/config.php';

//Includins visus skriptus is backendo, nežinau ar funkcijas į vieną .php failą kraut ar į atskirus
foreach(glob("backend/*.php") as $back)
{
    require $back;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $WebsiteTitle; ?></title>
<link rel="icon" href="favicon.png" type="image/png" sizes="16x16"> 
<!--<link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		echo "<form method='POST''>";
		echo "<button type='submit' name='logout'>Logout</button><br>";
		echo "</form>";

		if(isset($_POST['logout']))
		{
			if(Logout())
			{
				echo "You have logged out!<br>";
			}
			else
			{
				echo "ERROR<br>"; //neturetu but, but who knows
			}
		}

		echo "Hello, <b>".$_SESSION['nick']."</b>!<br><br>";

		echo "<b>File list:</b><br>";

		//Perskaitome katalogo turinį
		$usersDirectory = "./files/".$_SESSION['nick'];
		$fileList = scandir($usersDirectory);

		//Spausdiname katalogo turinį kaip href
		//TODO: Reiks nekvailai padaryt, kad sortintu pagal įkėlimo datą!
		$thereAreNoFiles = true;
		echo "<form method='POST'>";
		foreach ($fileList as $key => $value)
		{
			if($value == "." || $value == "..")
				continue;
			echo "<input type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
			<a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a><br>";
			$thereAreNoFiles = false;
		}
		echo "<button type='submit' name='delete'>Delete selected</button><br>";
		echo "</form>";

		//TRINTI FAILUS
		if(isset($_POST['delete']))
		{
			$selectedItems = $_POST['selectedItemsToDelete'];
			if(!empty($selectedItems))
			{
				foreach ($selectedItems as $key => $value) 
				{
					if (file_exists("./files/".$_SESSION['nick']."/".$value))
					{
						unlink("./files/".$_SESSION['nick']."/".$value);
						echo "File ".$value." was deleted!<br>";
					}
				}
			}
		}

		if($thereAreNoFiles)
			echo "<font color='red'>You have no files in your directory!</font><br>";

		echo "<br><br>";

		//Failo įkelimas į serverinę
		echo "<form method='POST' enctype='multipart/form-data'>"; // be enctype neveikia, ką jis daro? who knows.
		echo "<input type='file' name='file'>";
		echo "<button type='submit' name='submit'>Upload</button><br>";
		echo "</form>";

		//TODO: Automatiškai nesukuria vartotojui katalogo, kolkas jį manualiai reik sukurt, pagal vartotojo nick!

		//Logika vykdoma po UPLOAD paspaudimo
		//FAILAS issaugo files/nick kataloge!
		if (isset($_POST['submit']))
		{
			echo FileUpload(); //backend/FileUpload.php
		}
	}
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
