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

	function FileUpload()
	{
		//TODO: Automatiškai nesukuria vartotojui katalogo, kolkas jį manualiai reik sukurt, pagal vartotojo nick!

		//Logika vykdoma po UPLOAD paspaudimo
		//FAILAS issaugo files/nick kataloge!
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType= $_FILES['file']['type'];

		if($fileError === 0)
		{
			$fileDestination = "files/".$_SESSION['nick']."/".$fileName;					
			move_uploaded_file($fileTmpName, $fileDestination);
			return "<font color='red'>Failas įkeltas!</font><br>";
		}
		else
		{
			return "<font color='red'>Error įkeliant failą!</font><br>";
		}
	}

?>