<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>2iQuizz</title>
  <link rel="icon" type="image/png" href="ressources/2i.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>




<?php
//TODO: Si l'utilisateur n'est pas connecte, on affiche un lien de connexion 
echo "
<div class=\"header\"><div class=\"accueil-div\"><a class=\"accueil-a\" href=\"index.php?view=accueil\">Accueil</a></div>
<div class=\"rechercher-div\"><a class=\"rechercher-a\" href=\"index.php?view=rechercher\">Rechercher</a></div>
";

if (!valider("connecte", "SESSION")) {
  echo "
  <div class=\"connexion-div\"><a class=\"connexion-a\" href=\"index.php?view=login\">Connexion</a></div>
  <div class=\"inscription-div\"><a class=\"inscription-a\" href=\"index.php?view=inscription\">Inscription</a></div></header>";
}
else{
echo"
  <div class=\"deconnexion-div\"><a class=\"mes_quizz-a\" href=\"controleur.php?action=Logout\">Déconnexion</a></div>
  <div class=\"mes_quizz-div\"><a class=\"deconnexion-a\" href=\"index.php?view=mes_quizz\">Mes Quizz</a></div>
  <div class=\"profil-div\"><a class=\"profil-a\" href=\"index.php?view=profil\">Mon Profil</a></div>";
}



if ($feedback = valider("feedback", "GET")) {
  echo "<p class=\"warning\">$feedback</p>";
}

?>


<?php


?>

</div>






