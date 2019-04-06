<?php
	$dbServer = "localhost";
	//$dbUsername = "galgaldas_devbridge";
	//$dbPassword = "devbridge321";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "galgaldas_devbridge";
	$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

	if($conn == false)
	{
		//Jeigu prisijungimas blogas, stabdo kodą.
		//TODO: Sukurti kokį gražų error handlerį, kuris gražiai įspėtu vartotoja, kad neįšeina prisijungti prie duomenų bazės.
		die("Prisijungimas prie duomenu bazes buvo blogas<br>".mysqli_connect_error());
	}
?>
