<?php

//Modèle de notre site

include_once "maLibSQL.pdo.php";

function listerUtilisateurs($classe = "both")
{

  $requete = "SELECT * FROM utilisateurs";
  if ($classe == "bl") {
    $requete = $requete . " WHERE blacklist";
  }
  if ($classe == "nbl") {
    $requete = $requete . " WHERE NOT blacklist";
  }
  $requete = $requete . ";";
  return parcoursRs(SQLSelect($requete));
}


function interdireUtilisateur($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET blacklist = 1
	  WHERE id='$idUser';
	");
}

function autoriserUtilisateur($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET blacklist = 0
	  WHERE id='$idUser';
	");
}

function verifUserBdd($login,$passe)
{


	$SQL="SELECT ID FROM utilisateurs WHERE username='$login' AND mdp='$passe'";

	return SQLGetChamp($SQL);

}


function isAdmin($idUser)
{

	$SQL ="SELECT isadmin FROM utilisateurs WHERE ID='$idUser'";
	return SQLGetChamp($SQL); 
}


function mkUser($pseudo, $passe,$admin=false,$couleur="black")
{

	if ($admin) {
  	$isAdmin = '1';
	} else {
	  $isAdmin = '0';
	}
	SQLInsert("
	  INSERT INTO utilisateurs(pseudo, passe, admin, couleur)
	  VALUES ('$pseudo', '$passe', '$isAdmin', '$couleur');
	");
}

function connecterUtilisateur($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET connecte = 1
	  WHERE id='$idUser';
	");
}

function CréerUtilisateur($userame,$pseudo,$mdp)
{

	return SQLInsert("
	  INSERT INTO utilisateurs (Pseudo,username,mdp)
	  VALUES ('$pseudo','$userame','$mdp');"
);
}

function deconnecterUtilisateur($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET connecte = 0
	  WHERE id='$idUser';
	");
}



function changerPasse($idUser,$passe)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET passe = '$passe'
	  WHERE id='$idUser';
	");
}

function changerPseudo($idUser,$pseudo)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET pseudo = '$pseudo'
	  WHERE id='$idUser';
	");
}

function promouvoirAdmin($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET admin = 1
	  WHERE id='$idUser';
	");
}

function retrograderUser($idUser)
{

	return SQLUpdate("
	  UPDATE utilisateurs
	  SET admin = 0
	  WHERE id='$idUser';
	");
}



include_once("maLibUtils.php");

function listerUtilisateursConnectes()
{

	return parcoursRs(SQLSelect("
	  SELECT *
	  FROM utilisateurs
	  WHERE connecte=1;
	"));
}

function listertable($table)
{

	$requete = "SELECT * 
				FROM $table";
  return parcoursRs(SQLSelect($requete));
}


function listerQuizz()
{

	$requete = "SELECT * 
				FROM Quizz,utilisateurs,catégorie 
				WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz";
  return parcoursRs(SQLSelect($requete));
}
//Fonction de recherche 
function TrierQuizzN($NQuizz){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Nom_Quizz='$NQuizz'";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzC($CQuizz){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.pseudo='$CQuizz'";
return parcoursRs(SQLSelect($requete));
}
	
function TrierQuizzT($TQuizz){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Type_Quizz='$TQuizz'";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCa($CaQuizz){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie u
			  WHERE u.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and u.Catégorie='$CaQuizz'";
return parcoursRs(SQLSelect($requete));
}


function listerQuizzC($id)
{
	$requete = "SELECT * 
				FROM Quizz,utilisateurs,catégorie 
				WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.ID='$id' ";
  return parcoursRs(SQLSelect($requete));
}

//Fonction de recherche 
function TrierQuizzNC($NQuizz,$id){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Nom_Quizz='$NQuizz' and utilisateurs.ID='$id'";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCC($CQuizz,$id){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.pseudo='$CQuizz' and utilisateurs.ID='$id'";
return parcoursRs(SQLSelect($requete));
}
	
function TrierQuizzTC($TQuizz,$id){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie 
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Type_Quizz='$TQuizz' and utilisateurs.ID='$id'";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCaC($CaQuizz,$id){
	$requete="SELECT * 
			  FROM Quizz,utilisateurs,catégorie u
			  WHERE u.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and u.Catégorie='$CaQuizz' and utilisateurs.ID='$id'";
return parcoursRs(SQLSelect($requete));
}


function supprimerQuizz($idQuizz)
{
$requete="DELETE FROM qcm
		  WHERE Id_Quizz='$idQuizz'";
SQLDELETE($requête);
$requete="DELETE FROM vrai_faux
		  WHERE Id_Quizz='$idQuizz'";
SQLDELETE($requête);
$requete="DELETE FROM quizz_participé
		  WHERE Id_QUIZZ='$idQuizz'";
SQLDELETE($requête);
$requete="DELETE FROM QUIZZ
		  WHERE Id='$idQuizz'";
return SQLDELETE($requête);
}



function CréerQuizz($NomQUizz,$Catégorie2,$T2Quizz,$ID){
$requete1="SELECT ID FROM catégorie WHERE Catégorie='$Catégorie2'";

$Cat=SQLGetChamp($requete1);
$date=SQLGetChamp("Select Now()");
	$requete = "INSERT INTO quizz (Nom_quizz,Cat_Quizz,Date_Quizz,Créa_Quizz,Type_Quizz)
				VALUES('$NomQUizz','$Cat','$date','$ID','$T2Quizz')";
return SQLINSERT($requete);
				
}

?>
