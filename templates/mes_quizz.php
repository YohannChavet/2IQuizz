<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "mes_quizz.php") {
    header("Location:../index.php?view=mes_quizz");
    die("");
}

include "libs/modele.php";
include "libs/maLibSecurisation.php";
include "libs/maLibForms.php";

$catégorie = listertable('catégorie');
$quizz = listerQuizzC($_SESSION["idUser"]);
$type = listertable('type_quizz');

if ($action = valider('action')) ;
switch ($action) {

    case 'Rechercher par Nom' :
        $quizz = TrierQuizzNC($_GET['NomQ'], $_SESSION["idUser"]);
        break;

    case 'Rechercher par Auteur' :
        $quizz = TrierQuizzCC($_GET['NomC'], $_SESSION["idUser"]);
        break;

    case 'Rechercher par catégorie' :
        $quizz = TrierQuizzCaC($_GET['Catégorie'], $_SESSION["idUser"]);
        break;

    case 'Rechercher par type' :
        $quizz = TrierQuizzTC($_GET['TQuizz'], $_SESSION["idUser"]);
        break;

    default :
        $quizz = listerQuizzC($_SESSION["idUser"]);
        break;
} ?>


<style>
    .mes_quizz-a {
        text-decoration: underline;
    }
</style>
<div class="flex">
    <div class="left">
        <?php
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
            echo "&message= ''>";
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
        mkForm('controleur.php', 'GET');
        ?><p class="mlabel">Indiquez le Nom de Quizz : </p><?php
        mkInput("text", "NomQUizz", "");
        ?><p class="mlabel">Indiquez la Catégorie du Quizz : </p><?php
        mkSelect("Catégorie2", $catégorie, "Catégorie", "Catégorie");
        ?><p class="mlabel">Indiquez le type du Quizz : </p><?php
        mkSelect("T2Quizz", $type, "Type", "Type");
        mkInput("submit", "action", "Créer un Quizz");
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
        <div class="right-box"><p class="rtitle-p">Mes Quizz</p>
            <div id="recherche">
                <p class="label">Indiquez le nom du Quizz : </p><?php
                mkForm('index.php', 'GET');
                mkInput("text", "NomQ", "");
                mkInput('submit', 'action', 'Rechercher par Nom');
                ?><?php
                ?><p class="label">Indiquez la catégorie du Quizz : </p><?php
                mkSelect("Catégorie", $catégorie, "Catégorie", "Catégorie");
                mkInput('submit', 'action', 'Rechercher par catégorie');
                ?><p class="label">Indiquez le type du Quizz : </p><?php
                mkSelect("TQuizz", $type, "Type", "Type");
                mkInput('hidden', 'view', 'mes_quizz');
                mkInput('submit', 'action', 'Rechercher par type');
                endForm();
                ?></div>
        </div>
    </div>
</div>
</body>
