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
<link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		echo "Sveiki prisijungę, ".$_SESSION['nick']."!<br><br>";

		//Failo įkelimas į serverinę
		echo "<form method='POST' enctype='multipart/form-data'>"; // be enctype neveikia, ka jis daro? who knows.
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
		echo "Neturite teisės matyti šio puslapio!<br>";
	}

?>



</body>

</html>
