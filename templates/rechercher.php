<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "rechercher.php") {
    header("Location:../index.php?view=rechercher");
    die("");
}

include "libs/modele.php";
include "libs/maLibSecurisation.php";
include "libs/maLibForms.php";

$catégorie = listertable('catégorie');
$quizz = listerquizz();
$type = listertable('type_quizz');
?>

<body>
<div id="recherche">
    <p class="label">Indiquez le nom du Quizz : </p><?php
    mkForm('index.php', 'GET');
    mkInput("text", "NomQ", "");
    mkInput('submit', 'action', 'Rechercher par Nom');
    ?><p class="label">Indiquez le nom de l'auteur : </p><?php
    mkInput("text", "NomC", "");
    mkInput('submit', 'action', 'Rechercher par Auteur');
    ?><p class="label">Indiquez la catégorie du Quizz : </p><?php
    mkSelect("Catégorie", $catégorie, "Catégorie", "Catégorie");
    mkInput('submit', 'action', 'Rechercher par catégorie');
    ?><p class="label">Indiquez le type du Quizz : </p><?php
    mkSelect("TQuizz", $type, "Type", "Type");
    mkInput('hidden', 'view', 'rechercher');
    mkInput('submit', 'action', 'Rechercher par type');
    endForm();
    ?></div>
<?php


if ($action = valider('action')) ;
switch ($action) {

    case 'Rechercher par Nom' :
        $quizz = TrierQuizzN($_GET['NomQ']);
        break;

    case 'Rechercher par Auteur' :
        $quizz = TrierQuizzC($_GET['NomC']);
        break;

    case 'Rechercher par catégorie' :
        $quizz = TrierQuizzCa($_GET['Catégorie']);
        break;

    case 'Rechercher par type' :
        $quizz = TrierQuizzT($_GET['TQuizz']);
        break;

    default :
        $quizz = listerquizz();
        break;
}

echo "<table>";
echo "<tr>
      <th scope=\"col\">Nom</th>
      <th scope=\"col\">Catégorie</th>
      <th scope=\"col\">Type</th>
      <th scope=\"col\">Pseudo</th>
      <th scope=\"col\">Date</th>
      </tr>";
foreach ($quizz as $ligne) {
    echo "<tr>";
    echo "<th class=\"scope\"   ><a href=index.php?view=quizz&IDQuizz=";
    echo $ligne['IDQuizz'];
    echo ">";
    echo $ligne['Nom_Quizz'];
    echo "</a></th>";
    echo "<th>";
    echo $ligne['Catégorie'];
    echo "</th>";
    echo "<th>";
    echo $ligne['Type'];
    echo "</th>";
    echo "</th>";
    echo "<th>";
    echo $ligne['Pseudo'];
    echo "</th>";
    echo "<th>";
    echo $ligne['Date_Quizz'];
    echo "</th>";
    echo "</tr>";
}
echo "</table>";

echo "</a>";
?>
</body>