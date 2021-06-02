<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=login");
    die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE");
if ($checked = valider("remember", "COOKIE")) $checked = "checked";

?>

<style>
    .connexion-a {
        text-decoration: underline;
    }
</style>
<div id="corps">
    <h1 class="title">2IQuizz</h1>
    <h2 class="title-h2">Connexion</h2>
    <div class="Form">
        <form action="controleur.php" method="GET">
            <label for="login"> Nom d'utilisateur : </label><br/>
            <input type="text" id="login" name="login" value="<?php echo $login; ?>"/><br/><br/>
            <label for="passe">Mot de passe : </label><br/>
            <input type="password" id="passe" name="passe" value="<?php echo $passe; ?>"/><br/><br/>
            <label for="remember">Se souvenir de moi : </label>
            <input type="checkbox" <?php echo $checked; ?> name="remember" id="remember" value="ok"/><br/><br/>
            <input type="submit" name="action" value="Connexion"/>
        </form>
    </div>


</div>
</body>