<?php
include_once "libs/maLibForms.php";
include_once "libs/maLibUtils.php";
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibSecurisation.php"; 
include_once "libs/modele.php"; 
session_start();


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










