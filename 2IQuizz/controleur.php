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


    
    if ($action != "Connexion") 
      securiser("index.php");
      
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
            $qs["feedback"] = "Connexion réussie";
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

    }
  }


  $urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";

  rediriger($urlBase, $qs);
  ob_end_flush();
  
?>










