<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		?>
		<div class="container">
      <?php
			$page='bans';
      include 'includes/navbar.php';

      echo '<div class="main">';

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


</div>
</body>

</html>
