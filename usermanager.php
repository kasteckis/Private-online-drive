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

		echo "<form method='POST'>";

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
	        echo "<td><button name='edit".$row['id']."'>Edit</button></td>";
	        echo "<td><button name='remove".$row['id']."'>X</button></td></td>";
	        echo "</tr>";

	   		if(isset($_POST['edit'.$row['id']]))
		    {
		    	$_SESSION['editableUser'] = $row['id'];
		    	echo '<meta http-equiv="refresh" content="0; url=./edituser" />';
		    }
	   		if(isset($_POST['remove'.$row['id']]))
		    {
		    	$deletableId = $row['id'];
		    	$detetableNick = $row['nick'];
		    	$sqlDeleteUser = "DELETE FROM Users WHERE id='$deletableId'";
		    	delete_directory("./files/".$detetableNick);
		    	if(mysqli_query($conn, $sqlDeleteUser))
		    	{
		    		echo $detetableNick." sėkmingai ištrintas!<br>";
		    	}
		    	else
		    	{
		    		echo "KLAIDA trinant useri.<br>"; // niekada neturetu buti sitos klaidos
		    	}
		    }
	    }



	    echo "</table>";
	    echo "</form>";
	}
	else
	{
		echo "You are not authorised to view this page!<br>";
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
	}

?>



</body>

</html>
