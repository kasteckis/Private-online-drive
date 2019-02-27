<?php
	$dbServer = "localhost";
	$dbUsername = "valkas1";
	$dbPassword = "aiwesee5af3Ue3th";
	$dbName = "valkas1";
	$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
	
	if($conn == false)
	{
		//Jeigu prisijungimas blogas, stabdo kodą.
		//TODO: Sukurti kokį gražų error handlerį, kuris gražiai įspėtu vartotoja, kad neįšeina prisijungti prie duomenų bazės.
		die("Prisijungimas prie duomenu bazes buvo blogas<br>".mysqli_connect_error());
	}
?>