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
<link rel="stylesheet" href="css/styleManager.css"> 

</head>

<body>

<?php

	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		?>
		<div class="background">

			<div class="header">
				<div class="logo">
					<img src="images/logo.jpg" alt="Logo" height="130" width="206"> 
				</div>

				<div class="greeting">
					<h4>Hello, <?php echo $_SESSION['nick']?>!</h4>
					
					<form method='POST'>
						<button type='submit' name='logout'>Logout</button><br>
					</form>

					<?php
					if(isset($_POST['logout']))
					{
						if(Logout())
						{
							echo "You have logged out!<br>";
						}
						else
						{
							echo "ERROR<br>"; //neturetu but, but who knows
						}
					}
					?>
				</div>			
			</div>

			<div class="filelist">
				 
				<p>File list:</p><br>

				<?php
				//Perskaitome katalogo turinį
				$usersDirectory = "./files/".$_SESSION['nick'];
				$fileList = scandir($usersDirectory);
				
				//Spausdiname katalogo turinį kaip href
				//TODO: Reiks nekvailai padaryt, kad sortintu pagal įkėlimo datą!
				$thereAreNoFiles = true;
				?>
				
				<form method='POST'>
				<?php foreach ($fileList as $key => $value)
				{
					if($value == "." || $value == "..")
						continue; ?>

					<?php
					echo "<input type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
					<a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a><br>"; ?>

					<?php 
					$thereAreNoFiles = false;
				}?>
				
				<!-- Jeigu nera failu direktorijoja, nerodys delete mygtuko -->
				<?php
				if(!$thereAreNoFiles)
				{
					?>
					<button type='submit' name='delete'>Delete selected</button><br>
					<?php
				} ?>
				</form> 

				<?php
				if(isset($_POST['delete']))
				{
					if(isset($_POST['selectedItemsToDelete']))
					{
						$selectedItems = $_POST['selectedItemsToDelete'];
					}
					else
					{
						echo "<font color='red'>Select at least one file!</font><br>";
					}
					
					if(!empty($selectedItems))
					{
						DeleteTheseFiles($selectedItems); //FileUpload.php
					}
				}
		
				if($thereAreNoFiles)
					echo "<font color='red'>You have no files in your directory!</font><br>";
		
				echo "<br><br>"; ?>
						
			</div>

			<div class="maindisplay">
				<div class="upload">
					
					<p>CIA BUS DRAG AND DROP I GUESS</p>

					<!-- //Failo įkelimas į serverinę -->
					<form method='POST' enctype='multipart/form-data'> <!--"; // be enctype neveikia, ką jis daro? who knows. -->
					<input type='file' name='file'>
					<button type='submit' name='submit'>Upload</button><br>
					</form>

					<?php
						//TODO: Automatiškai nesukuria vartotojui katalogo, kolkas jį manualiai reik sukurt, pagal vartotojo nick!

						//Logika vykdoma po UPLOAD paspaudimo
						//FAILAS issaugo files/nick kataloge!
						if (isset($_POST['submit']))
						{
							echo FileUpload(); //backend/FileUpload.php
						}

						if($_SESSION['status'] == "admin")
						{
							echo '<br><form action="/usermanager">';
							echo '<input type="submit" value="User manager" />';
							echo '</form>';
						}

						} 


						else
						{
						//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
						echo "You are not authorised to view this page!<br>";
						} 
					?>
				</div>

				<div class="icons">
					<p>CIA BUS LOGO FAILU kaip GOOGLE drive</p>
				</div>
			</div>

		</div>
<?php
/*
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	} */
?>



</body>

</html>
