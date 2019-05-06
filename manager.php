<?php include 'includes/header.php';
?>
<body>

<?php

  //Ar sitas turi per visa puslapi eiti ar ne?
	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
		?>
		<div class="background">
      <?php
      include 'includes/navbar.php';
    }
    else
    {
    echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
    echo $notAuthorised;
    }
  ?>

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
						echo "<font color='red'>".$selectFile."</font><br>";
					}

					if(!empty($selectedItems))
					{
						DeleteTheseFiles($selectedItems); //FileUpload.php
						//echo '<meta http-equiv="refresh" content="0; />';
					}
				}

				if($thereAreNoFiles)
					echo "<font color='red'>".$noFilesInDirectory."</font><br>";

				echo "<br><br>"; ?>

			</div>

			<div class="maindisplay">
				<div class="upload">

					<!-- //Failo įkelimas į serverinę -->
          <div id="dropZone" ondragover="overrideDefault(event);fileHover();"
          ondragenter="overrideDefault(event);fileHover();"
          ondragleave="overrideDefault(event);fileHoverEnd();"
          ondrop="overrideDefault(event);fileHoverEnd();addFiles(event)">
            <img src="images/upload.png" alt="uploadpic" width="100px" height="100px">
            <h2 id=fileLabelText>Drag and Drop files here...</h2><br>
            <input type="file" id="fileupload" class="inputfile" name="attachments[]" multiple onchange="addFiles(event)">
            <label for="fileupload"> Choose a file... </label><br><br><br>
            <progress id="progressBar" value="0" max="100"></progress>
            <h3 id="progress"></h3><br><br><br><br>
            <h3 id="error"></h3><br><br>
          </div>
          <br><br><br>

					<?php
						/*
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
							echo '<br><form action="/logs">';
							echo '<input type="submit" value="View logs" />';
							echo '</form>';
						}

						}


						else
						{
						//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
						echo "You are not authorised to view this page!<br>";
						} */
					?>
				</div>
			</div>
      <script src="js/fileUpload.js"></script>
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
