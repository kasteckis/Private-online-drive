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
			$page='usermanager';
       include 'includes/navbar.php';
			 include 'includes/file-nav.php';
      ?>



			<div class="sub-page-main">
				<div class="display-menu">
					<!-- Or delete just the button if no buttons on the page -->
					<!--<button class="btn-display-menu" type='submit' name='dosmth' ><i class="fas fa-trash-alt"></i> button example</button>-->
				</div>
				<div class="newuser">
					 <form action="/createnewuser">
					 <input type="submit" value="Create new user" />
					 </form>
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
					if($_SESSION['nick'] == $row['nick'])
						echo "<td>Edit</td>";
					else
						echo "<td><button class='butonas' name='edit".$row['id']."'>Edit</button></td>";
					if($_SESSION['nick'] == $row['nick'])
						echo "<td>X</td>";
					else
						echo "<td><button class='butonas1' type='button' name='".$row['nick']."' id='".$row['id']."' >X</button></td></td>";
					if($_SESSION['nick'] == $row['nick'])
						echo "<td>View</td>";
					else
						echo "<td><button class='butonas' name='view".$row['id']."'>View</button></td>";
					echo "</tr>";

					if(isset($_POST['edit'.$row['id']]))
					{
						$_SESSION['editableUser'] = $row['id'];
						echo '<meta http-equiv="refresh" content="0; url=./edituser" />';
					}

					if(isset($_POST['view'.$row['id']]))
					{
						$_SESSION['viewingFiles'] = $row['nick'];
						$_SESSION['specAccesToViewFile'] = "2000-01-01 00:00:00";
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
$(".butonas1").click(function() {
  var idid = this.id;
  var nicknick = this.name;

  var varData = 'id=' + idid + '&nick=' + nicknick;

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
						$.ajax({
							type: 'POST',
							url: 'includes/userdelete',
							data: varData,
							success: function() {
								console.log("deleted succesfully!");
							}

						});
						location.reload(true);
					}
				});


});

});
</script>
</div>
</body>

</html>
