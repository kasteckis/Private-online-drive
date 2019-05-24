<div class="header">
	<div class="navigation-container">

	<div class="logo">
		<a href="./manager"><img class="logo-img" src="../images/logo.jpg" alt="Logo"></a>
	</div>

	<!-- <div class="greeting"> -->
		<!-- <h4><?php //echo $welcome.", ".$_SESSION['nick']?>!</h4> -->

		<div class="btn-place">
			<div class="btn-nav-right">
				<ul class="link-list">
					<li>
						<a class="btn-navbar <?php if($page=='settings'){echo 'navbar-active';}?>" href="./settings">Settings</a>
					</li>
					<li>
						<form style="margin: 0;" method='POST'>
							<button class="btn-navbar" type='submit' name='logout'>Logout</button>
						</form>
					</li>
				</ul>
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


				<ul class="link-list padding-left">
					<li>
					 <a class="btn-navbar <?php if($page=='manager'){echo 'navbar-active';}?>" href="./manager">Home</a>
				 </li>
				 <li>
					 <a class="btn-navbar <?php if($page=='notes'){echo 'navbar-active';}?>" href="./notes">Notes</a>
				 </li>
				 <li>
					 <a class="btn-navbar <?php if($page=='share'){echo 'navbar-active';}?>" href="./share">Share files</a>
				 </li>
				 <?php
				if($_SESSION['status'] == "admin")
				{
					?>

					<li>
						<a class="btn-navbar <?php if($page=='usermanager'){echo 'navbar-active';}?>" href="./usermanager">User manager</a>
						</li>
					<li>
						<a class="btn-navbar <?php if($page=='logs'){echo 'navbar-active';}?>" href="./logs">View logs</a>
					</li>
					<li>
						<a class="btn-navbar <?php if($page=='bans'){echo 'navbar-active';}?>" href="./bans">Bans</a>
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
