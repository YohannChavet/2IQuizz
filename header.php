<?php
$user_connected = True;

echo '<header><div class="accueil"><a href="./index.php">Accueil</a></div>
<div class="rechercher"><a href="./rechercher.php">Rechercher</a></div>
<div class="mes_quizz"><a href="./mes_quizz.php">Mes Quizz</a></div>';

if ($user_connected) {
    echo '<div class="profil"><a href="./profil.php">Mon Profil</a></div>
<div class="deconnexion"><a href="./deconnexion.php">Déconnexion</a></div></header>';
} else {
    echo '<div class="connexion"><a href="./connexion.php">Connexion</a></div>
<div class="connexion"><a href="./inscription.php">Inscription</a></div></header>';
}
?>

