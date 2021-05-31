<?php
session_start();

	include_once "libs/maLibUtils.php";

	$view = valider("view"); 

	if (!$view) $view = "accueil"; 


	include("templates/header.php");

	switch($view)
	{		

		case "accueil" : 
			include("templates/accueil.php");
		break;


		default :
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");

	}
?>







