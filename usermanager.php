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
		echo '<form action="/manager">';
	    echo '<input type="submit" value="Back" />';
		echo '</form>';

		//Mygtukas sukurti useri jauna
		echo '<br><form action="/createnewuser">';
	    echo '<input type="submit" value="Create new user" />';
		echo '</form><br><br>';

		echo "<b>User list:</b><br>";
		$sqlReadAllUsers = "SELECT * FROM Users";
		$resultReadAllUsers = mysqli_query($conn, $sqlReadAllUsers);

		echo "<table>";
		echo "<tr>"; //nick, status, suspension, last connected
		echo "<th>Nick</th>";
		echo "<th>Status</th>";
		echo "<th>Is active</th>";
		echo "<th>Last connection</th>";
		echo "<th>Edit</th>";
		echo "<th>Delete</th>";
		echo "</tr>";
		

	    while($row = mysqli_fetch_assoc($resultReadAllUsers)) 
	    {
	    	echo "<tr>";
	        echo "<td>".$row['nick']."</td>";
	        echo "<td>".$row['status']."</td>";
	        if($row['suspended'] == "0")
	        	echo "<td>Active</td>";
	        else
	        	echo "<td>Suspended</td>";
	        echo "<td>".$row['lastLogged']."</td>";
	        echo "<td>bus button</td>";
	        echo "<td>X</td>";
	        echo "</tr>";
	    }
	    echo "</table>";
	}
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
