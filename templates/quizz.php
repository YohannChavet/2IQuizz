<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "quizz.php") {
    header("Location:../index.php?view=quizz");
    die("");
}

include "libs/modele.php";
include "libs/maLibSecurisation.php";
include "libs/maLibForms.php";


$auteur = AuteurQuizz($_GET['IDQuizz']);
echo $auteur;
if ($auteur === $_SESSION["idUser"]) {
    echo 'oui';

} else {
    echo 'non';
}

?>
</body>