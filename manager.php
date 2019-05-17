<?php
include 'includes/header.php';
require 'includes/config.php';
?>
<body>

<div class="container">
<?php
  //Ar sitas turi per visa puslapi eiti ar ne?
	if($_SESSION['status'] == "admin" || $_SESSION['status'] == "user")
	{
    include 'includes/navbar.php';
  }
  else
  {
		echo '<meta http-equiv="refresh" content="0; url=./errorAuthorization.shtml" />';
		echo $notAuthorised;
  }
  ?>

	<div class="file-nav-container">

		<h2>Directory</h2>
		<?php
			//Perskaitome katalogo turinį
			$usersDirectory = "./files/".$_SESSION['nick'];
			$fileList = scandir($usersDirectory);

			//Spausdiname katalogo turinį kaip href
			//TODO: Reiks nekvailai padaryt, kad sortintu pagal įkėlimo datą!
			$thereAreNoFiles = true;
		?>
		<div class="file-nav">
				<ul class="file-nav-list">
						<?php
							foreach ($fileList as $key => $value)
							{
								if($value == "." || $value == "..")
									continue;

									print("<li>
									<a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a>
									</li>");


								$thereAreNoFiles = false;
							}
							?>
				</ul>
		</div>
	</div>


			<div class="main-display">
				<form method='POST'>
					<div class="display-menu">
						<button id="Click" class="btn-display-menu" type='submit' name='delete' onclick="DoFunction()"><i class="fas fa-trash-alt"></i> Delete selected</button>
	          <input type="file" id="fileupload" class="inputfile" name="attachments[]" multiple onchange="addFiles(event)">
	          <label for="fileupload"><i class="fas fa-file-upload"></i> Choose a file... </label>
	          <!-- <li>
	            <button class="btn-display-menu">Other feature</button>
	            </li> -->
	        </div>


				<div class="upload">
					<!-- //Failo įkelimas į serverinę -->
					<div id="dropZone" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();addFiles(event)">
						<span id="FileLabel"></span>
						<progress id="progressBar" value="0" max="100"></progress>
						<h3 id="progress"></h3>
						<h3 id="error"></h3>
						<button type="submit" id="cancel" class="butn">Cancel</button>
						<!-- <img id="img-upload" src="images/upload.png" alt="uploadpic"> -->
            <table class="sortable">
              <thead>
                <tr>
									<th></th>
                  <th>Filename</th>
                  <th>Type</th>
                <th>Size</th>
                <th>Date Modified</th>
                </tr>
              </thead>
              <tbody>
								<?php

								foreach ($fileList as $key => $value)
								{

									if($value == "." || $value == "..")
										continue;
									$favicon="";
									$class="file";

										// Gets file extension
										$extn=pathinfo($value, PATHINFO_EXTENSION);

										// Prettifies file type
										switch ($extn){
											case "png": $extn="PNG Image"; break;
											case "jpg": $extn="JPEG Image"; break;
											case "jpeg": $extn="JPEG Image"; break;
											case "svg": $extn="SVG Image"; break;
											case "gif": $extn="GIF Image"; break;
											case "ico": $extn="Windows Icon"; break;

											case "txt": $extn="Text File"; break;
											case "log": $extn="Log File"; break;
											case "htm": $extn="HTML File"; break;
											case "html": $extn="HTML File"; break;
											case "xhtml": $extn="HTML File"; break;
											case "shtml": $extn="HTML File"; break;
											case "php": $extn="PHP Script"; break;
											case "js": $extn="Javascript File"; break;
											case "css": $extn="Stylesheet"; break;

											case "pdf": $extn="PDF Document"; break;
											case "xls": $extn="Spreadsheet"; break;
											case "xlsx": $extn="Spreadsheet"; break;
											case "doc": $extn="Microsoft Word Document"; break;
											case "docx": $extn="Microsoft Word Document"; break;

											case "zip": $extn="ZIP Archive"; break;
											case "htaccess": $extn="Apache Config File"; break;
											case "exe": $extn="Windows Executable"; break;

											default: if($extn!=""){$extn=strtoupper($extn)." File";} else{$extn="Unknown";} break;
										}


										$fileSize = filesize("./files/".$_SESSION['nick']."/".$value);
										$fileSizeType = "Bytes";
										if($fileSize >= 1024)
										{
											$fileSize = round($fileSize / 1024, 2);
											$fileSizeType = "KB";
											if($fileSize >= 1024)
											{
												$fileSize = round($fileSize / 1024, 2);
												$fileSizeType = "MB";
												if($fileSize >= 1024)
												{
													$fileSize = round($fileSize / 1024, 2);
													$fileSizeType = "GB";
												}
											}
										}

										$fileSize = $fileSize." ".$fileSizeType;


										$fileModTime = date ("Y-m-d H:i:s", filemtime("./files/".$_SESSION['nick']."/".$value));

										echo("
										<tr class='$class'>
											<td>
												<input class='nav-checkbox' type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
											</td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a></td>
		                  <td><a href='./files/".$_SESSION['nick']."/".$value."'>$extn</a></td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>".$fileSize."</a></td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>".$fileModTime."</a></td>
		            		</tr>
										");


									$thereAreNoFiles = false;
								}
?>
              </tbody>
            </table>
						<?php
						if($thereAreNoFiles)
							echo "<font color='red'>".$noFilesInDirectory."</font><br>";
							?>
          </div>

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
			if(isset($_POST['cancel']))
			{
					 echo '<script type="text/JavaScript">
					 location.reload(true);
			     </script>'
			;
			}

/*
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	} */
?>

	</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
var belekas = <?php echo $FileUploadLimit ?>;
</script>

	<script src="js/fileUpload.js"></script>
	<!-- <script src="js/.sorttable.js"></script> -->
</body>

</html>
