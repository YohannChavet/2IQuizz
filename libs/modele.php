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



function listerConversations($mode="tout")
{

	$requete = "SELECT * FROM conversations";
  if ($mode == "actives") {
    $requete = $requete . " WHERE active=1";
  }
  if ($mode == "inactives") {
    $requete = $requete . " WHERE active=0";
  }
  $requete = $requete . ";";
  return parcoursRs(SQLSelect($requete));
}



function archiverConversation($idConversation)
{

	return SQLUpdate("
	  UPDATE conversations
	  SET active = 0
	  WHERE id='$idConversation';
	");
}



function creerConversation($theme)
{

	SQLUpdate("
	  INSERT INTO conversations(theme)
	  VALUES ('$theme');
	");

	return SQLGetChamp("
	  SELECT MAX(id)
	  FROM conversations
	  WHERE theme='$theme';
	");
}



function reactiverConversation($idConversation)
{	

	return SQLUpdate("
	  UPDATE conversations
	  SET active = 1
	  WHERE id='$idConversation';
	");
}



function supprimerConversation($idConv)
{

	SQLDelete("
	  DELETE FROM message
	  WHERE idConversation='$idConv';
	");
	return SQLDelete("
	  DELETE FROM conversations
	  WHERE id='$idConv';
	");
}



function enregistrerMessage($idConversation, $idAuteur, $contenu)
{

	$contenu = str_replace("<", "&lt;", $contenu);
	$contenu = str_replace(">", "&gt;", $contenu);
	$contenu = str_replace("&", "&amp;", $contenu);
	return SQLInsert("
	  INSERT INTO message(idConversation, idAuteur, contenu)
	  VALUES ('$idConversation', '$idAuteur', '$contenu');
	");
}










?>
