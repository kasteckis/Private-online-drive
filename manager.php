<?php include 'includes/header.php';
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
						<ul>
							<li>
								<button class="btn-display-menu" type='submit' name='delete'>Delete selected</button>
							</li>
							<li>
								<input type="file" id="fileupload" class="inputfile" name="attachments[]" multiple onchange="addFiles(event)">
								<label for="fileupload"> Choose a file... </label>
							</li>
							<li>
								<button class="btn-display-menu">Other feature</button>
							</li>
						</ul>
					</div>

				<div class="upload">
					<!-- //Failo įkelimas į serverinę -->
					<div id="dropZone" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();addFiles(event)">
            <progress id="progressBar" value="0" max="100"></progress>
            <h3 id="progress"></h3>
            <h3 id="error"></h3>
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


										//Doesnt work for getting date
										// $modtime=date("M j Y g:i A", filemtime($value));
										// $timekey=date("YmdHis", filemtime($value));

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
										// Gets and cleans up file size/ Doesnt get file size problems with filesize
											// $size=pretty_filesize($value);
											// $sizekey=filesize($value);

											// echo("
									 		// <tr class='$class'>
									 		// 	<td><a href='./$namehref'$favicon class='name'>$name</a></td>
									 		// 	<td><a href='./$namehref'>$extn</a></td>
									 		// 	<td sorttable_customkey='$sizekey'><a href='./$namehref'>$size</a></td>
									 		// 	<td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
									 		// </tr>");

										echo("
										<tr class='$class'>
											<td>
												<input class='nav-checkbox' type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
											</td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a></td>
		                  <td><a href='./files/".$_SESSION['nick']."/".$value."'>$extn</a></td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>size</a></td>
		            			<td><a href='./files/".$_SESSION['nick']."/".$value."'>modtime</a></td>
		            		</tr>
										");



										// print("<li>
										// <a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a>
										// <input class='nav-checkbox' type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
										// </li>");


									$thereAreNoFiles = false;
								}
?>
              </tbody>
            </table>
						<?php
						if($thereAreNoFiles)
							echo "<font color='red'>".$noFilesInDirectory."</font><br>";
							?>

						<h2 id=fileLabelText>Drag and Drop files here...</h2>
          </div>

					<?php
					// Adds pretty filesizes/ Doesnt work because filesize doesnt get files size
					// function pretty_filesize($file) {
					// 	$size=filesize($file);
					// 	if($size<1024){$size=$size." Bytes";}
					// 	elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
					// 	elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
					// 	else{$size=round($size/1073741824, 1)." GB";}
					// 	return $size;
					// }




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

/*
	else
	{
		//TODO: Kad redirectintu į kokį gražų ERROR puslapį.
		echo "You are not authorised to view this page!<br>";
	} */
?>

	</div>
</div>
	<script src="js/fileUpload.js"></script>
	<!-- <script src="js/.sorttable.js"></script> -->
</body>

</html>
