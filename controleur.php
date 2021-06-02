<?php
session_start();

  include_once "libs/maLibUtils.php";
  include_once "libs/maLibSQL.pdo.php";
  include_once "libs/maLibSecurisation.php"; 
  include_once "libs/modele.php"; 

  $qs = $_GET;
  if ($action = valider("action"))
  {
    ob_start ();
    echo "Action = '$action' <br />";


    
      
    // L'utilisateur est-il admin ?
    $isAdmin = valider("isAdmin", "SESSION");

    // Un paramètre action a été soumis, on fait le boulot...
    switch($action)
    {
      
      
      // Connexion //////////////////////////////////////////////////
      case 'Connexion' :
        $qs = [];
        // On verifie la presence des champs login et passe
        if ($login = valider("login"))
        if ($passe = valider("passe"))
        {
          // On verifie l'utilisateur, 
          // et on crée des variables de session si tout est OK
          // Cf. maLibSecurisation
          if (verifUser($login,$passe)) {
            // tout s'est bien passé, on marque comme connecté dans la BDD
            connecterUtilisateur(valider("idUser", "SESSION"));
            // doit-on se souvenir de la personne ? 
            if (valider("remember")) {
              setcookie("login",$login , time()+60*60*24*30);
              setcookie("passe",$password, time()+60*60*24*30);
              setcookie("remember",true, time()+60*60*24*30);
            } else {
              setcookie("login","", time()-3600);
              setcookie("passe","", time()-3600);
              setcookie("remember",false, time()-3600);
            }
          } else {
            $qs["feedback"] = "Identifiant ou mot de passe invalide";
          }
        }
      break;

      case 'Inscription' :
        if($login2=valider("login2"));
        if($pseudo2=valider("pseudo2"));
        if($passe2=valider("passe2"));
        CréerUtilisateur($pseudo2,$login2,$passe2);
        break;

      case 'Logout' :
        session_destroy();
        deconnecterUtilisateur(valider("idUser", "SESSION"));
        break;
        
      case 'Créer un Quizz' ;
      if($NomQUizz=valider("NomQUizz"));
      if($Catégorie2=valider("Catégorie2"));
      if($T2Quizz=valider("T2Quizz"));
      CréerQuizz($NomQUizz,$Catégorie2,$T2Quizz,$_SESSION["idUser"]);
      $qs = "view=mes_quizz";
      break;

      case 'Supprimer la question' :
        if($type=valider("type"));
        if($NQues=valider("NQues"));
        $IDQuizz=$_GET['IDQuizz'];

         if(QuestionexisteQCM($NQues,$IDQuizz,$type)!=0){
          SupprimerQCM($IDQuizz,$NQues);
           $message='';
        }
        elseif(QuestionexisteVF($NQues,$IDQuizz)!=0){
          SupprimerVF($IDQuizz,$NQues);
          $message='';
          }
        else{
         $message='Sélectionnez une question existante';
         }
         $qs = "view=quizz&IDQuizz=$IDQuizz&message=$message";
         break;

      case 'Modifier une question' :
         if($type=valider("type"));
         if($Question=valider("Question"));
         if($NQues=valider("NQues"));
         $IDQuizz=$_GET['IDQuizz'];
  
        if(QuestionexisteQCM($NQues,$IDQuizz,$type)!=0){
          if($Reponse=valider("Reponse"));
           if($CHOIX1=valider("CHOIX1"));
           if($CHOIX2=valider("CHOIX2"));
           if($CHOIX3=valider("CHOIX3"));
           modifierquestionQCM($IDQuizz,$NQues,$Question,$Reponse,$CHOIX1,$CHOIX2,$CHOIX3);
           $message='';
        }
         elseif(QuestionexisteVF($NQues,$IDQuizz)!=0){
          if($VraiFaux=valider('VraiFaux'));
           modifierquestionVF($IDQuizz,$NQues,$Question,$VraiFaux);
           $message='';
          }
         else{
        $message='Sélectionnez une question existante';
        }
        $qs = "view=quizz&IDQuizz=$IDQuizz&message=$message";
        break;        

        
         case 'Créer une question' :
          if($type=valider("type"));
          if($Question=valider("Question"));
          if($NQues=valider("NQues"));
          $IDQuizz=$_GET['IDQuizz'];
  
           if(QuestionexisteQCM($NQues,$IDQuizz,$type)===false){
            if($Reponse=valider("Reponse"));
             if($CHOIX1=valider("CHOIX1"));
             if($CHOIX2=valider("CHOIX2"));
             if($CHOIX3=valider("CHOIX3"));
             ajouterquestionQCM($IDQuizz,$NQues,$Question,$Reponse,$CHOIX1,$CHOIX2,$CHOIX3);
             $message='';
           }
           elseif(QuestionexisteVF($NQues,$IDQuizz)===false){
            $VraiFaux=$_GET['VraiFaux'];
            ajouterquestionVF($IDQuizz,$NQues,$Question,$VraiFaux);
            $message='';
           }
          else{
          $message='Le numéro de question existe déjà';
          }
          $qs = "view=quizz&IDQuizz=$IDQuizz&message=$message";
          break;        
    }
    
  }


  $urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";

  rediriger($urlBase, $qs);
  ob_end_flush();
  
?>










