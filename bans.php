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
<link rel="stylesheet" href="css/styleNotes.css"> 

</head>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		?>
		<div class="background">
			<div class="back">
				<?php
				//Mygtukas atgal
				echo '<form action="/manager">';
				echo '<input type="submit" value="Back" />';
				echo '</form>';
				echo "Coming soon";
				?>

			</div>
			<?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
