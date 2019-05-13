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

			    $sqlGetBans = "SELECT * FROM BadLogins ORDER BY lastLogin DESC";
			    $resultsGetBans = mysqli_query($conn, $sqlGetBans);

			    if (mysqli_num_rows($resultsGetBans) > 0)
			    {
					echo "<form method='POST'>";
					echo '<table method="POST">';
					echo '<tr>';
				    echo '<th>IP</th>';
				    echo '<th>Tries to login into account</th> ';
				    echo '<th>Banned till</th>';
				    echo '<th>Date</th>';
				    echo '<th>Delete</th>';
				    echo '</tr>';
				    while($row = mysqli_fetch_assoc($resultsGetBans))
				    {
				    	echo "<tr>";
				        echo "<td>".$row['ip']."</td>";
				        echo "<td>".$row['tries']."</td>";
				        echo "<td>".$row['bannedTill']."</td>";
				        echo "<td>".$row['lastLogin']."</td>";
				        echo "<td><button name=".$row['id'].">X</button></td>";
				        echo "</tr>";

				        if(isset($_POST[$row['id']]))
				        {
				        	$sqlDeleteThisBan = "DELETE FROM BadLogins WHERE id=".$row['id'];
				        	if(mysqli_query($conn, $sqlDeleteThisBan))
				        	{
				        		echo "Succesfully unbanned ".$row['ip'];
				        		header("Refresh:0");
				        	}
				        	else
				        	{
				        		echo "Critical error bans.php.<br>!"; //neturetu but
				        	}
				        }
				    }
				    echo "</table>";
				    echo "</form>";
				} 
				else 
				{
				    echo "There are no banned IP's!<br>";
				}


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
