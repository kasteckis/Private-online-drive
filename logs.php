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
		echo '</form><br><br>';

		$sqlGetData = "SELECT * FROM Logs";
		$resultsData = mysqli_query($conn, $sqlGetData);

		echo "<form method='POST'>";

		echo "<table>";
		echo "<tr>"; //nick, status, suspension, last connected
		echo "<th>Log text</th>";
		echo "<th>User</th>";
		echo "<th>Ip</th>";
		echo "<th>Date</th>";
		echo "<th>Delete</th>";
		echo "</tr>";

	    while($row = mysqli_fetch_assoc($resultsData))
	    {
	    	echo "<tr>";
	        echo "<td>".$row['text']."</td>";
	        if(strlen($row['user']) != 0)
	        {
	        	echo "<td>".$row['user']."</td>";
	        }
	        else
	        {
	        	echo "<td><i>UNKNOWN</i></td>";
	        }
	        echo "<td>".$row['ip']."</td>";
	        echo "<td>".$row['date']."</td>";
	        echo "<td><button name='delete".$row['id']."'>X</button></td>";
	        echo "</tr>";

	   		if(isset($_POST['delete'.$row['id']]))
		    {
		    	$rowId = $row['id'];
		    	$sqlDeleteCurrentLog = "DELETE FROM Logs WHERE id='$rowId'";
		    	if(mysqli_query($conn, $sqlDeleteCurrentLog))
		    	{
		    		echo "Sėkmingai ištrintas!<br>";
		    		echo '<meta http-equiv="refresh" content="0;" />';
		    	}
		    	else
		    	{
		    		echo "KLAIDA!<br>".mysqli_error($conn);;
		    	}
		    }
		}

	    echo "</table>";
	    echo "</form>";

	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo "You are not authorised to view this page!<br>";
	}

?>



</body>

</html>
