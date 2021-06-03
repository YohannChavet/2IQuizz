<?php

//Modèle de notre site

include_once "maLibSQL.pdo.php";




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


	$SQL="SELECT ID FROM utilisateurs WHERE username=BINARY '$login' AND mdp=BINARY '$passe'";

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

	$requete = "SELECT * ,quizz.ID as IDQuizz 
				FROM Quizz,utilisateurs,catégorie,type_quizz
				WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and type_quizz.ID=Quizz.Type";
  return parcoursRs(SQLSelect($requete));
}
//Fonction de recherche 
function TrierQuizzN($NQuizz){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Nom_Quizz='$NQuizz' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzC($CQuizz){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.pseudo='$CQuizz' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}
	
function TrierQuizzT($TQuizz){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and type_quizz.type='$TQuizz' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCa($CaQuizz){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie u,type_quizz
			  WHERE u.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and u.Catégorie='$CaQuizz' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}


function listerQuizzC($id)
{
	$requete = "SELECT *,quizz.ID as IDQuizz 
				FROM Quizz,utilisateurs,catégorie,type_quizz
				WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.ID='$id' and type_quizz.ID=Quizz.Type ";
  return parcoursRs(SQLSelect($requete));
}

//Fonction de recherche 
function TrierQuizzNC($NQuizz,$id){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and Quizz.Nom_Quizz='$NQuizz' and utilisateurs.ID='$id' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCC($CQuizz,$id){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and utilisateurs.pseudo='$CQuizz' and utilisateurs.ID='$id' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}
	
function TrierQuizzTC($TQuizz,$id){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie,type_quizz
			  WHERE catégorie.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and type_quizz.type='$TQuizz' and utilisateurs.ID='$id' and type_quizz.ID=Quizz.Type";
return parcoursRs(SQLSelect($requete));
}

function TrierQuizzCaC($CaQuizz,$id){
	$requete="SELECT *,quizz.ID as IDQuizz 
			  FROM Quizz,utilisateurs,catégorie u,type_quizz
			  WHERE u.ID=Quizz.Cat_Quizz and utilisateurs.ID=Quizz.Créa_Quizz and u.Catégorie='$CaQuizz' and utilisateurs.ID='$id' and type_quizz.ID=Quizz.Type";
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
$cartpe='Type';
$Cat=SQLGetChamp($requete1);
$date=SQLGetChamp("Select Now()");
$type=SQLGetChamp("SELECT ID FROM type_quizz WHERE $cartpe='$T2Quizz'");
	$requete = "INSERT INTO quizz (Nom_quizz,Cat_Quizz,Date_Quizz,Créa_Quizz,$cartpe)
				VALUES('$NomQUizz','$Cat','$date','$ID','$type')";
return SQLINSERT($requete);
				
}



function AuteurQuizz($IdQuizz){
	$requete="SELECT Créa_Quizz
			  FROM quizz
			  WHERE ID=$IdQuizz";
return SQLGetChamp($requete);
}



function ajouterquestionVF($IDQ,$NQuestion,$Question,$VF){
$requête="INSERT INTO vrai_faux (ID_Quizz,N_QUestion,Question,VraiFaux)
		  VALUES ('$IDQ','$NQuestion','$Question','$VF')";
return SQLINSERT($requête);
}



function ajouterquestionQCM($IDQ,$NQuestion,$Question,$Reponse,$C1,$C2,$C3){
	$requête="INSERT INTO qcm (ID_Quizz,N_QUestion,Question,Reponse,CHOIX1,CHOIX2,CHOIX3)
	VALUES ('$IDQ','$NQuestion','$Question','$Reponse','$C1','$C2','$C3')";
return SQLINSERT($requête);
}



function Pseudo($Iduser){
	$requete="SELECT Pseudo
			  FROM utilisateurs
			  WHERE ID='$Iduser'";
return SQLGetChamp($requete);
}



function listerquestionVF($idQuizz){
$requête ="SELECT N_Question,Question,VraiFaux
			FROM vrai_faux
			WHERE ID_Quizz='$idQuizz'";
return parcoursRs(SQLSELECT($requête));
}



function listerquestionQCM($idQuizz){
	$requête ="SELECT N_Question,Question,Reponse,CHOIX1,CHOIX2,CHOIX3
			   FROM QCM
			   WHERE ID_Quizz='$idQuizz'";
return parcoursRs(SQLSELECT($requête));
}



function IsVRaiFaux($idQuizz){
$type='Type';
	$requete="SELECT $type
			  FROM quizz
			  WHERE ID='$idQuizz'";
$aux=SQLGetChamp($requete);
if($aux==1){
	return 0;
}
else {
	return 1;
}
}

function modifierquestionVF($IDQ,$NQuestion,$Question,$VF){
	$requête="UPDATE vrai_faux 
		      SET Question='$Question',VraiFaux='$VF'
			  WHERE ID_Quizz='$IDQ' and N_Question='$NQuestion'";
	return SQLUPDATE($requête);
	}
function modifierquestionQCM($IDQ,$NQuestion,$Question,$Reponse,$CHOIX1,$CHOIX2,$CHOIX3){
		$requête="UPDATE qcm
				  SET Question='$Question',Reponse='$Reponse',CHOIX1='$CHOIX1',CHOIX2='$CHOIX2',CHOIX3='$CHOIX3'
				  WHERE ID_Quizz='$IDQ' and N_Question='$NQuestion'";
		return SQLUPDATE($requête);
		}

function SupprimerVF($IDQuizz,$NQues){
	$requête="DELETE FROM vrai_faux
			  WHERE ID_Quizz='$IDQuizz' and N_Question='$NQues'";
return SQLDELETE($requête);
}

function SupprimerQCM($IDQuizz,$NQues){
	$requête="DELETE FROM qcm
			  WHERE ID_Quizz='$IDQuizz' and N_Question='$NQues'";
return SQLDELETE($requête);
}

function QuestionexisteVF($NQuestion,$Quizz){
	$requete="SELECT ID
			  FROM vrai_faux
			  WHERE ID_Quizz='$Quizz' and N_Question='$NQuestion'";
return SQLGetChamp($requete);
}

function QuestionexisteQCM($NQuestion,$Quizz,$type){
	if($type==='QCM'){
		$requete="SELECT ID
				  FROM vrai_faux
				  WHERE ID_Quizz='$Quizz' and N_Question='$NQuestion'";
	return SQLGetChamp($requete);
	}
	return 0;
}

function tabale(){
$nb_a_tirer = 4;
$val_min = 1;
$val_max = 4;
$tab_result = array();
while($nb_a_tirer != 0 )
{
  $nombre = mt_rand($val_min, $val_max);
  if( !in_array($nombre, $tab_result) )
  {
    $tab_result[] = $nombre;
    $nb_a_tirer--;
  }
}
return $tab_result;
}




function afficherquestionQCM($quizz,$table){
$i=0;
$q=0;
foreach($quizz as $ligne){
	echo "<div class=\"NQuest\">";
	echo "Question n° : ";
	echo $ligne['N_Question'];
	echo "</div>";
	echo "<div class=\"Quest\">";
	echo "Question : ";
	echo $ligne['Question'];
	echo "</div>";
	$i = 0;
	for($i;$i<=4;$i++){
		foreach($table as $key => $value){
			if($i===$value){
			if($key=='PosR'){
				echo "<p>";
				echo $quizz[$q]['Reponse'];
				echo "</p>";
				mkRadioCb("radio",$ligne['N_Question'],"Reponse");
			}
			elseif($key=='PosC1'){
				echo "<p>";
				echo $quizz[$q]['CHOIX1'];
				echo "</p>";
				mkRadioCb("radio",$ligne['N_Question'],"CHOIX1");
			}
			elseif($key=='PosC2'){
				echo "<p>";
				echo $quizz[$q]['CHOIX2'];
				echo "</p>";
				mkRadioCb("radio",$ligne['N_Question'],"CHOIX2");
			}
			else{
				echo "<p>";
				echo $quizz[$q]['CHOIX3'];
				echo "</p>";
				mkRadioCb("radio",$ligne['N_Question'],"CHOIX3");
			}
			}
		}
		

	}
	$q=$q +1;
}
}


function message($message=" "){
	$aux = $message;
	echo $aux;
}


function afficherquestionVF($quizz){
	$i=0;
	$q=0;
	foreach($quizz as $ligne){
		echo "<div class=\"NQuest\">";
		echo "Question n° : ";
		echo $ligne['N_Question'];
		echo "</div>";
		echo "<div class=\"Quest\">";
		echo "Question : ";
		echo $ligne['Question'];
		echo "</div>";
		echo "Vrai";
		mkRadioCb("radio",$ligne['N_Question'],"Vrai");
		echo "Faux";
		mkRadioCb("radio",$ligne['N_Question'],"Faux");
	}
	}
?>
