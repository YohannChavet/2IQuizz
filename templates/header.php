<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php");
    die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>2iQuizz</title>
    <link rel="icon" type="image/png" hssourceref="res/2i.png"/>
    <script src="js/script.js"></script>

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>
<div class="header">
    <h3 class="header-theme">Thème :</h3>
    <a class="svg-light-a" onclick="theme('light');">
        <span class="span-theme">
        <object class="svg-theme" data="./ressources/day.svg" width="36" height="36"></object>
        </span>
    </a>
    <a class="svg-dark-a" onclick="theme('dark');">
        <span class="span-theme">
        <object class="svg-theme" data="./ressources/night.svg" width="36" height="36"></object>
        </span>
    </a>
    <a class="svg-red-a" onclick="theme('red');">
        <span class="span-theme">
        <object class="svg-theme" data="./ressources/red.svg" width="36" height="36"></object>
        </span>
    </a>
    <div class="accueil-div"><a class="accueil-a" onclick="view('accueil');">Accueil</a></div>
    <div class="rechercher-div"><a class="rechercher-a" onclick="view('rechercher');">Rechercher</a></div>

    <?php //TODO: Si l'utilisateur n'est pas connecte, on affiche un lien de connexion

    if (!valider("connecte", "SESSION")) {
        echo "
  <div class=\"connexion-div\"><a class=\"connexion-a\" onclick=\"view('login');\">Connexion</a></div>
  <div class=\"inscription-div\"><a class=\"inscription-a\" onclick=\"view('inscription');\">Inscription</a></div></header>";
    } else {
        echo "
  <div class=\"deconnexion-div\"><a class=\"mes_quizz-a\" href=\"controleur.php?action=Logout\">Déconnexion</a></div>
  <div class=\"mes_quizz-div\"><a class=\"deconnexion-a\" onclick=\"view('mes_quizz')\">Mes Quizz</a></div>
  <div class=\"profil-div\"><a class=\"profil-a\" onclick=\"view('profil');\">Mon Profil</a></div>";
    }


    if ($feedback = valider("feedback", "GET")) {
        echo "<p class=\"warning\">$feedback</p>";
    }

    ?>


    <?php


    ?>

</div>






