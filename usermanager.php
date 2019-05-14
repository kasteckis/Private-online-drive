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
<link rel="stylesheet" href="css/styleUser.css">

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
				?>
			</div>

			<div class="newuser">
				<?php
				//Mygtukas sukurti useri jauna
				echo '<form action="/createnewuser">';
				echo '<input type="submit" value="Create new user" />';
				echo '</form>';
				?>
			</div>

			<div class="main">
				<?php
				echo "<h3>User list:</h3>";
				$sqlReadAllUsers = "SELECT * FROM Users ORDER BY lastLogged DESC";
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
				echo "<th>View Files</th>";
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
					if("0000-00-00 00:00:00" == $row['lastLogged'])
						echo "<td>Never</td>";
					else
						echo "<td>".$row['lastLogged']."</td>";
					echo "<td><button name='edit".$row['id']."'>Edit</button></td>";
					if($_SESSION['nick'] == $row['nick'])
						echo "<td>X</td>";
					else
						echo "<td><button type='button' name='".$row['nick']."' id='".$row['id']."' class='button_1' >X</button></td></td>";
					echo "<td><button name='view".$row['id']."'>View</button></td>";
					echo "</tr>";

					if(isset($_POST['edit'.$row['id']]))
					{
						$_SESSION['editableUser'] = $row['id'];
						echo '<meta http-equiv="refresh" content="0; url=./edituser" />';
					}

					if(isset($_POST['view'.$row['id']]))
					{
						$_SESSION['viewingFiles'] = $row['nick'];
						echo '<meta http-equiv="refresh" content="0; url=./viewfiles" />';
					}
				}



				echo "</table>";
				echo "</form>";
				?>
			</div>

		</div> <?php
	}
	else
	{
		echo "You are not authorised to view this page!<br>";
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
	}

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
$(".button_1").click(function() {
  var idid = this.id;
  var nicknick = this.name;

  var varData = 'id=' + idid + '&nick=' + nicknick;
  $.ajax({
    type: 'POST',
    url: 'includes/userdelete',
    data: varData,
    success: function() {
      swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this user!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("User has been deleted!", {
                  icon: "success",
                });
                location.reload(true);
              }
            });
    }

  });
});

});
</script>

</body>

</html>
