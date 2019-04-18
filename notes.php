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

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		//Mygtukas atgal
		echo '<form action="/manager">';
	    echo '<input type="submit" value="Back" />';
		echo '</form><br><br>';

		$userId = $_SESSION['id'];
		$sqlGetUsersNote = "SELECT * FROM Users WHERE id='$userId'";
		$resultsGetUsersNote = mysqli_query($conn, $sqlGetUsersNote);
		$row = mysqli_fetch_assoc($resultsGetUsersNote);

		echo "<form method='POST'>";
		echo '<textarea rows="15" cols="50" name="note">';
		echo $row['note'];
		echo '</textarea><br>';
		echo "<button name='update'>Update</button>";
		echo "</form>";

		if(isset($_POST['update']))
		{
			$newNote = mysqli_real_escape_string($conn, $_POST['note']);
			$updateNote = "UPDATE Users SET note='$newNote' WHERE id='$userId'";
			if(mysqli_query($conn, $updateNote))
			{
				echo "Updated succesfully!<br>";
				echo '<meta http-equiv="refresh" content="0;" />';
			}
			else
			{
				echo "ERROR."; //niekada neturetu buti
			}
		}
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
