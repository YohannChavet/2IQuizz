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


<style>
    .rechercher-a {
        text-decoration: underline;
    }
</style>
<div class="flex">
    <div class="left">
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
      <th class=\"row1\" scope=\"col\">Nom</th>
      <th class=\"row1\" scope=\"col\">Catégorie</th>
      <th class=\"row1\" scope=\"col\">Type</th>
      <th class=\"row1\" scope=\"col\">Pseudo</th>
      <th class=\"row1\" scope=\"col\" id=\"last-col\">Date</th>
      </tr>";
        foreach ($quizz as $ligne) {
            echo "<tr>";
            echo "<th class=\"scope\"   ><a class='table-a' href=index.php?view=quizz&IDQuizz=";
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
            echo "<th>";
            echo $ligne['Pseudo'];
            echo "</th>";
            echo "<th id=\"last-col\">";
            echo $ligne['Date_Quizz'];
            echo "</th>";
            echo "</tr>";
        }
        echo "</table>";

        echo "</a>";
        ?>
    </div>
    <div class="right">
        <div class="spikes">
            <?php

            for ($i = 1; $i <= 50; $i++) {
                echo '<div class="spike"></div>';
            }
            ?>
        </div>
        <div class="right-box"><p class="rtitle-p">Rechercher</p>
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
        </div>
    </div>
</div>
</body>