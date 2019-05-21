<div class="header">
	<div class="navigation-container">

	<div class="logo">
		<a href="./manager"><img class="logo-img" src="../images/logo.jpg" alt="Logo"></a>
	</div>

	<!-- <div class="greeting"> -->
		<!-- <h4><?php //echo $welcome.", ".$_SESSION['nick']?>!</h4> -->

		<div class="btn-place">
			<div class="btn-nav-right">
				<form action="/settings">
					<button class="btn-navbar" type="submit">Settings</button>
				</form>
				<form method='POST'>
					<button class="btn-navbar" type='submit' name='logout'>Logout</button>
				</form>

			</div>

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
				?>


				<ul class="link-list">
					<li>
 					 <form action="/manager">
 					 <button class="btn-navbar" type="submit">Home</button>
 					 </form>
 				 </li>

				 <li>
					 <form action="/notes">
					 <button class="btn-navbar" type="submit">Notes</button>
					 </form>
				 </li>
 				 <li>
					 <form action="/share">
					 <button class="btn-navbar" type="submit">Share files</button>
					 </form>
				 </li>
				 <?php
				if($_SESSION['status'] == "admin")
				{
					?>

					<li>
						<form action="/usermanager">
						<button class="btn-navbar" type="submit">User manager</button>
						</form>
						</li>
					<li>
						<form action="/logs">
						<button class="btn-navbar" type="submit">View logs</button>
						</form>
					</li>
					<li>
						<form action="/bans">
						<button class="btn-navbar" type="submit">Bans</button>
						</form>
					</li>
					 <!-- <li>
					 <form action="/viewother">
					 <button type="submit">View other files</button>
					 </form>
					 </li> -->

				<?php }?>
				</ul>
			</div>
		</div>
	</div>
