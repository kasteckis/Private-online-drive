<?php
session_start();
require 'includes/mysql_connection.php';
require 'includes/config.php';
require 'includes/messages.php';

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
					<h4><?php echo $welcome.", ".$_SESSION['nick']?>!</h4>

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
							}
							else
							{
							echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
							echo $notAuthorised;
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

          <style type="text/css">
          #dropZone {
            border: 3px dashed #0088cc;
            padding: 50px;
            width: 90%;
            height: 150%;
            margin-top: 20px;
            margin: 16px;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
            transition: 0.5s;
            background-color: #f5f5f5;
            display: block;
            position: relative;
          }
          .inputfile {
        	width: 0.1px;
        	height: 0.1px;
        	opacity: 0;
        	overflow: hidden;
        	position: absolute;
        	z-index: -1;
        }

        .inputfile + label {
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: #2699ab;
            display: inline-block;
            cursor: pointer;
            border: solid;
            border-width: 1px;
            border-color: #124d77;
            width: 150px;
            height: 20px;
            text-align: center;
            font-size: 18px;
        }
        .inputfile:focus + label {
        	outline: 1px dotted #000;
        	outline: -webkit-focus-ring-color auto 5px;
        }

        .inputfile:focus + label,
        .inputfile + label:hover {
            background-color: #228999;
        }

        #dropZone:after,
        #dropZone:before {
          position: absolute;
          content: "";
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background-color: #fff;
          z-index: -2;
          border-radius: 8px 8px 0 0;
        }

        #dropZone:before {
          z-index: -1;
          background: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 5%,
            black 5%,
            black 10%
          );
          opacity: 0;
          transition: 0.5s;
        }

        #dropZone.fileHover:before {
          opacity: 0.25;
        }
          #files {
            border: 1px dotted #0088cc;
            padding: 20px;
            width: 200px;
            display: none;
          }

          #error {
            color: red;
            display: none;
          }
          #dropZone.fileHover {
          box-shadow: 0 0 16px blue;
        }
          #progressBar {
            display: none;
          }
          #progress {
            display: none;
          }
          .upload{
              width:100%;
              height:28%;
              background-color: #f5f5f5;
          }
          </style>
          <div id="dropZone" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();addFiles(event)">
            <img src="images/upload.png" alt="uploadpic" width="100px" height="100px">
            <h2 id=fileLabelText>Drag and Drop files here...</h2><br>
            <input type="file" id="fileupload" class="inputfile" name="attachments[]" multiple onchange="addFiles(event)">
            <label for="fileupload"> Choose a file... </label><br><br><br>
            <progress id="progressBar" value="0" max="100"></progress>
            <h3 id="progress"></h3><br><br><br><br>
            <h3 id="error"></h3><br><br>
          </div>
          <br><br><br>

          <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
          <script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
          <script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
          <script src="js/jquery.fileupload.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(function () {
              var files = $("#files");

              $("#fileupload").fileupload({
                url: 'manager',
                dropZone: '#dropZone',
                dataType: 'json',
                autoUpload: false
              }).on('fileuploadadd', function (e, data) {
            /*    var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                var fileName = data.originalFiles[0]['name'];
                var fileSize = data.originalFiles[0]['size'];
                if (!fileTypeAllowed.test(fileName))
                  $("#error").html("Only images are allowed");
                else if (fileSize > 500000)
                  $("#error").html("Your file is too big!")
                else {
                  $("#error").html("");
                  data.submit();
                } */

                data.submit();
              }).on('fileuploaddone', function (e, data) {
                // on fileuploaddone...
              }).on('fileuploadprogressall', function(e, data) {
                  var progress = parseInt(data.loaded / data.total * 100, 10);
                  var bar = document.getElementById('progressBar');
                  $("#progress").html("Completed: " + progress + "%");
                  bar.value = progress;
                  if (progress == 100)
                  {
                    $("#error").html("Uploaded succesfully!");
                  }
              });
            });

                  function overrideDefault(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    document.getElementById('progressBar').style.display = "none";
                    document.getElementById('error').style.display = "none";
                    document.getElementById('progress').style.display = "none";
                    $("#error").html("");
                  }

                  function fileHover() {
                    dropZone.classList.add("fileHover");
                  }

                  function fileHoverEnd() {
                    dropZone.classList.remove("fileHover");
                  }

                  function addFiles(event) {
                    droppedFiles = event.target.files || event.dataTransfer.files;
                    showFiles(droppedFiles);
                    document.getElementById('progressBar').style.display = "inline";
                    document.getElementById('error').style.display = "inline";
                    document.getElementById('progress').style.display = "inline";
                  }

                  function showFiles(files) {
                    if (files.length > 1) {
                      fileLabelText.innerText = files.length + " files selected";
                    } else {
                      fileLabelText.innerText = files[0].name;
                    }
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
