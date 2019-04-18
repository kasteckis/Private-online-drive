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
<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" /> 
<!--<link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		//Mygtukas atgal
		echo '<form action="/usermanager">';
	    echo '<input type="submit" value="Back" />';
		echo '</form><br><br>';

		// apsaugos jeigu useris cia pateko be sesijos reiksmes
		if($_SESSION['viewingFiles'] == null)
		{
			echo "You should not be here.<br>";
			return;
		}

		$usersDirectory = "./files/".$_SESSION['viewingFiles'];
		$fileList = scandir($usersDirectory);

		echo "Viewing <b>".$_SESSION['viewingFiles']."</b> files!<br>";
		echo "<form method='POST'>";
		$thereAreNoFiles = true;
		foreach ($fileList as $key => $value)
		{
			if($value == "." || $value == "..")
				continue; 

			
			echo "<input type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
			<a href='./files/".$_SESSION['viewingFiles']."/".$value."'>".$value."</a><br>";

			$thereAreNoFiles = false;
		}

		//Jeigu nera failu direktorijoja, nerodys delete mygtuko
		
		if(!$thereAreNoFiles)
		{
			echo "<button type='submit' name='delete'>Delete selected</button><br>";
		} 
		echo "</form>";

		if(isset($_POST['delete']))
		{
			if(isset($_POST['selectedItemsToDelete']))
			{
				$selectedItems = $_POST['selectedItemsToDelete'];
			}
			else
			{
				echo "<font color='red'>Select at least one file!</font><br>";
			}

			if(!empty($selectedItems))
			{
				DeleteTheseFiles2($selectedItems, $_SESSION['viewingFiles']); //FileUpload.php
				//echo '<meta http-equiv="refresh" content="0; />';
			}
		}

		if($thereAreNoFiles)
			echo "<font color='red'>This user has no files in his directory!</font><br>";

		echo "<br><br>";

	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
