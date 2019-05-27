<?php
include 'includes/header.php';
require 'includes/config.php';
?>

<body>
<?php

	if($_SESSION['status'] == "admin")
	{
		?>
		<div class="containers">
      <?php
			$page='logs';
      include 'includes/navbar.php';
			include 'includes/file-nav.php';
      ?>
			<div class="sub-page-main">
				<div class="display-menu">
          <!-- Or delete just the button if no buttons on the page -->
					
				</div>
			<div class="main">
				<?php
				$sqlGetData = "SELECT * FROM Logs ORDER BY date DESC";
				$resultsData = mysqli_query($conn, $sqlGetData);

				echo "<form method='POST'>";
				echo '<button name="deleteOldLogs">Delete logs older than 7 days</button>';
				echo "</form>";
				if(isset($_POST['deleteOldLogs']))
				{
					$sqlGetCountOfOldLogs = "SELECT * FROM Logs WHERE DATE(date) < DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
					$resultsGetCountOfOldLogs = mysqli_query($conn, $sqlGetCountOfOldLogs);
					$removedOldLogsCount = mysqli_num_rows($resultsGetCountOfOldLogs);

					$sqlDeleteOldLogs = "DELETE FROM Logs WHERE DATE(date) < DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
					if(mysqli_query($conn, $sqlDeleteOldLogs))
					{
						echo $removedOldLogsCount." old logs were succesfully removed!<br>";
					}
					else
					{
						echo "ERROR".mysqli_error($conn);
					}
				}
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
					echo "<td><button class='butonas' name='delete".$row['id']."'>X</button></td>";
					echo "</tr>";

					if(isset($_POST['delete'.$row['id']]))
					{
						$rowId = $row['id'];
						$sqlDeleteCurrentLog = "DELETE FROM Logs WHERE id='$rowId'";
						if(mysqli_query($conn, $sqlDeleteCurrentLog))
						{
							echo "You have succesfully removed a log!<br>";
							echo '<meta http-equiv="refresh" content="0;" />';
						}
						else
						{
							echo "KLAIDA!<br>".mysqli_error($conn);;
						}
					}
				}

				echo "</table>";
				echo "</form>"; ?>
			</div>
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
