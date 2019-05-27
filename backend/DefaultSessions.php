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
	if(!isset($_SESSION['editableUser']))
	{
		$_SESSION['editableUser'] = null;
	}
	if(!isset($_SESSION['viewingFiles']))
	{
		$_SESSION['viewingFiles'] = null;
	}
	if(!isset($_SESSION['specAccesToViewFile']))
	{
		$_SESSION['specAccesToViewFile'] = "2000-01-01 00:00:00";
	}

?>