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
					<div class="adminbtn">
						<?php

							//Logika vykdoma po UPLOAD paspaudimo

							//FAILAS issaugo files/nick kataloge!
							if (isset($_POST['submit']))
							{
								echo FileUpload(); //backend/FileUpload.php
							}

							if($_SESSION['status'] == "admin")
							{
								echo '<ul>';
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
								echo '</ul>';
							}

							}
							else
							{
							echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';	
							echo "You are not authorised to view this page!<br>";
							}
						?>
					</div>
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

					<!-- //Failo įkelimas į serverinę -->
					<form method='POST' id="dropFileForm" enctype="multipart/form-data" ondrop="uploadFiles(event);"> <!--"; // be enctype neveikia, ką jis daro? who knows. -->
					<input type="file" name="file" id="fileInput" multiple onchange="addFiles(event)" >
          <label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                addFiles(event)">
            <i class="fa fa-download fa-5x"></i>
            <br>
            <span id="fileLabelText">
              Choose a file or drag it here
            </span>
            <br>
            <span id="uploadStatus"></span>
          </label>
          <button type='submit' name='submit' class="uploadButton">Upload</button><br>
					</form>
          <br><br><br>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script type="text/javascript">

          var dropFileForm = document.getElementById("dropFileForm");
          var fileLabelText = document.getElementById("fileLabelText");
          var uploadStatus = document.getElementById("uploadStatus");
          var fileInput = document.getElementById("fileInput");
          var droppedFiles;

          function overrideDefault(event) {
            event.preventDefault();
            event.stopPropagation();
          }

          function fileHover() {
            dropFileForm.classList.add("fileHover");
          }

          function fileHoverEnd() {
            dropFileForm.classList.remove("fileHover");
          }

          function addFiles(event) {
            droppedFiles = event.target.files || event.dataTransfer.files;
            showFiles(droppedFiles);
          }

          function showFiles(files) {
            if (files.length > 1) {
              fileLabelText.innerText = files.length + " files selected";
            } else {
              fileLabelText.innerText = files[0].name;
            }
          }
          var fileobj;
          function uploadFiles(event) {
            event.preventDefault();
            changeStatus("Uploading...");
            for (i = 0; i < droppedFiles.length; i++) {
              fileobj = droppedFiles[i];
              ajax_file_upload(fileobj);
            }
            }



          function file_explorer() {
            document.getElementById('fileInput').click();
            document.getElementById('fileInput').onchange = function() {
                fileobj = document.getElementById('fileInput').files[0];
              ajax_file_upload(fileobj);
            };
          }

          function ajax_file_upload(file_obj) {
            if(file_obj != undefined) {
              var form_data = new FormData();
              form_data.append('file', form_data);
              $.ajax({
                type: 'POST',
                url: 'Ajax.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                  alert(response);
                  $('#selectfile').val('');
                }
              });
            }
          }
          function changeStatus(text) {
            uploadStatus.innerText = text;
          }


          </script>


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

				<div class="icons">

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
