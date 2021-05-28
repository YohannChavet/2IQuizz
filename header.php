<?php
$user_connected = True;

echo '<style>
header {
    background-color: #2e6da4;
    color: #2e6da4;
}
.accueil-div, .rechercher-div {
    float: left;
    margin-left: 5%;
    color: white;
}
</style>
<header><div class="accueil-div"><a class="accueil-a" href="./index.php">Accueil</a></div>
<div class="rechercher-div"><a class="rechercher-a" href="./rechercher.php">Rechercher</a></div>
';

if ($user_connected) {
    echo '<style>
.profil-div, .deconnexion-div {
    float: right;
    margin-right: 5%;
    color: white;
}
.mes_quizz-div {
    float: left;
    margin-left: 5%;
    color: white;
}
</style>
<div class="mes_quizz-div"><a class="mes_quizz-a" href="./mes_quizz.php">Mes Quizz</a></div>
<div class="deconnexion-div"><a class="deconnexion-a" href="./deconnexion.php">Déconnexion</a></div>
<div class="profil-div"><a class="profil-a" href="./profil.php">Mon Profil</a></div>
</header>';
} else {
    echo '<style>
.connexion-div, .inscription-div {
    float: right;
    margin-right: 5%;
    color: white;
}
</style>
<div class="connexion-div"><a class="connexion-a" href="./connexion.php">Connexion</a></div>
<div class="inscription-div"><a class="inscription-a" href="./inscription.php">Inscription</a></div></header>';
}
?>

