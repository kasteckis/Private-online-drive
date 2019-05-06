<div class="header">
	<div class="logo">
		<img src="../images/logo.jpg" alt="Logo" height="130" width="206">
	</div>

	<!-- <div class="greeting"> -->
		<!-- <h4><?php //echo $welcome.", ".$_SESSION['nick']?>!</h4> -->

		<form method='POST'>
			<button type='submit' name='logout'>Logout</button><br>
		</form>

		<?php
		if(isset($_POST['logout']))
		{
			if(Logout())
			{
				echo $loggedOut;
			}
			else
			{
				echo $error; //neturetu but, but who knows
			}
		}
		?>
		<div class="adminbtn">
			<?php

				//Logika vykdoma po UPLOAD paspaudimo

				//FAILAS issaugo files/nick kataloge!
				if (isset($_POST['submit']))
				{
					echo FileUpload(); //backend/FileUpload.php
				}
        if (isset($_FILES['attachments']))
        {
          echo FileUpload();
        }

				echo '<ul>';

				echo '<li>';
				echo '<form action="/settings">';
				echo '<input type="submit" value="Settings" />';
				echo '</form>';
				echo '</li>';

				echo '<li>';
				echo '<form action="/notes">';
				echo '<input type="submit" value="Notes" />';
				echo '</form>';
				echo '</li>';

				if($_SESSION['status'] == "admin")
				{
					echo '<li>';
					echo '<form action="/usermanager">';
					echo '<input type="submit" value="User manager" />';
					echo '</form>';
					echo '</li>';
					echo '<li>';
					echo '<form action="/logs">';
					echo '<input type="submit" value="View logs" />';
					echo '</form>';
					echo '</li>';
					// echo '<li>';
					// echo '<form action="/viewother">';
					// echo '<input type="submit" value="View other files" />';
					// echo '</form>';
					// echo '</li>';


				}

				echo '</ul>';
			?>
		</div>
	<!-- </div> -->
</div>
