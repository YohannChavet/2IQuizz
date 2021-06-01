<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "mes_quizz.php")
{
	header("Location:../index.php?view=mes_quizz");
	die("");
}

include "libs/modele.php";
include "libs/maLibSecurisation.php";
include "libs/maLibForms.php";

$catégorie=listertable('catégorie');
$quizz = listerQuizzC($_SESSION["idUser"]);

?>

<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<div id="recherche">
<p class="label">Indiquez le nom du Quizz : </p><?php
mkForm('index.php','GET');
mkInput("text","NomQ","");
mkInput('submit','action','Rechercher par Nom');
?><?php
?><p class="label">Indiquez la catégorie du Quizz : </p><?php
mkSelect("Catégorie",$catégorie,"Catégorie","Catégorie");
mkInput('submit','action','Rechercher par catégorie');
?><p class="label">Indiquez le type du Quizz : </p><?php
mkSelect("TQuizz",$quizz,"Type_Quizz","Type_Quizz");
mkInput('hidden','view','mes_quizz');
mkInput('submit','action','Rechercher par type');
endForm();
?></div>
<?php


if($action=valider('action'));
switch($action){

    case 'Rechercher par Nom' :
        $quizz = TrierQuizzNC($_GET['NomQ'],$_SESSION["idUser"]);
        break;
        
    case 'Rechercher par Auteur' :
        $quizz = TrierQuizzCC($_GET['NomC'],$_SESSION["idUser"]);
         break;

    case 'Rechercher par catégorie' :
        $quizz = TrierQuizzCaC($_GET['Catégorie'],$_SESSION["idUser"]);
        break;
        
    case 'Rechercher par type' :
        $quizz = TrierQuizzTC($_GET['TQuizz'],$_SESSION["idUser"]) ;
        break;

    default :
    $quizz = listerQuizzC($_SESSION["idUser"]);
    break;
}

mkTable($quizz,array("Nom_Quizz","Catégorie","Type_Quizz","Pseudo","Date_Quizz"));

mkForm('controleur.php','GET');
?><p class="label">Indiquez le Nom de Quizz : </p><?php
mkInput("text","NomQUizz","");
?><p class="label">Indiquez la Catégorie du Quizz : </p><?php
mkSelect("Catégorie2",$catégorie,"Catégorie","Catégorie");
?><p class="label">Indiquez le type du Quizz : </p><?php
mkSelect("T2Quizz",$quizz,"Type_Quizz","Type_Quizz");
mkInput("submit","action","Créer un Quizz");

?>
