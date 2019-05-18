<?php
	function DeleteTheseFiles($selectedItems)
	{
		foreach ($selectedItems as $key => $value)
		{
			if (file_exists("./files/".$_SESSION['nick']."/".$value))
			{
				unlink("./files/".$_SESSION['nick']."/".$value);
				echo "File ".$value." was deleted!<br>";
			}
		}
	}

	function DeleteTheseFiles2($selectedItems, $nick)
	{
		foreach ($selectedItems as $key => $value)
		{
			if (file_exists("./files/".$nick."/".$value))
			{
				unlink("./files/".$nick."/".$value);
				echo "File ".$value." was deleted!<br>";
			}
		}
	}

	function FileUpload()
	{
		//Logika vykdoma po UPLOAD paspaudimo
		//FAILAS issaugo files/nick kataloge!
		echo '<script type="text/JavaScript">
		swal ( "Oops" ,  "File type is not supported" ,  "error" );
		</script>'
		;
		$msg = "";
		$targetFile = "files/".$_SESSION['nick']."/" . basename($_FILES['attachments']['name'][0]);
		if (file_exists($targetFile)) {
			$msg = array("status" => 0, "msg" => "File already exists!");
		}
		else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
				$msg = array("status" => 1, "msg" => "File has been Uploaded", "path" => $targetFile);

		exit(json_encode($msg));
	}

?>
