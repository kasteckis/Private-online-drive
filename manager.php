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
			<form method='POST'>
				<ul class="file-nav-list">
						<?php
							foreach ($fileList as $key => $value)
							{
								if($value == "." || $value == "..")
									continue;

									print("<li>
									<a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a>
									<input class='nav-checkbox' type='checkbox' name='selectedItemsToDelete[]' value='".$value."'>
									</li>");


								$thereAreNoFiles = false;
							}
						echo "</ul>";
							// Jeigu nera failu direktorijoja, nerodys delete mygtuko
							if(!$thereAreNoFiles)
							{
								print("<div class='btn-delete-file'>
					        <button type='submit' name='delete'>Delete selected</button>
					      </div>");

							}
							echo '</form>';
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


		echo "</div>";

		if($thereAreNoFiles)
			echo "<font color='red'>".$noFilesInDirectory."</font><br>";
			?>
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
                <tr class="table-row">
									<td>
										<input class='nav-checkbox' type='checkbox'>
									</td>
            			<td><a>$name</a></td>
                  <td><a>$extn</a></td>
            			<td ><a>$size</a></td>
            			<td ><a>$modtime</a></td>
            		</tr>
              </tbody>
            </table>
						<h2 id=fileLabelText>Drag and Drop files here...</h2>
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


<?php
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
