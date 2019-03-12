<?php

	/*Čia laikinai bus tam tikri CONFIG, kuriuos galės nustatyti administratorius, 
	vėliau juos reikės perkelti į duomenų bazę, kad administratorius galėtu juos laisvai keisti.
	Kadangi nežinome kiek jų bus ir neefektyvu pastoviai pildyti duomenų bazę, kolkas jie bus čia, vėliau perkelsim!*/

	//Kadangi čia globalūs kintamieji, rašom iš didžiųjų!!

	$WebsiteTitle = "Private online drive"; //Webo Title
	date_default_timezone_set("Europe/Vilnius"); //default timezone http://php.net/manual/en/timezones.php
	
	//Kad rodytu warningus per web
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

?>