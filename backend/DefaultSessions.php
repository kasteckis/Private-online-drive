<?php

	//Jeigu sesijos neturi reikšmių, jos čia įgys default reikšmę, kad nemėtytu warningų.
	if(!isset($_SESSION['id']))
	{
		$_SESSION['id'] = null;
	}
	if(!isset($_SESSION['nick']))
	{
		$_SESSION['nick'] = null;
	}
	if(!isset($_SESSION['status']))
	{
		$_SESSION['status'] = null;
	}
	if(!isset($_SESSION['password']))
	{
		$_SESSION['password'] = null;
	}
	if(!isset($_SESSION['suspended']))
	{
		$_SESSION['suspended'] = null;
	}
	if(!isset($_SESSION['lastLogged']))
	{
		$_SESSION['lastLogged'] = null;
	}

	//TODO: Padaryti patikrinimą kiekvieną refreshą ir atnaujinti visus sesijos duomenis, jeigu ID turi reikšmę.
?>