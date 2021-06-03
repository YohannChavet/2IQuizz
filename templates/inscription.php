<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=inscription");
    die("");
}

// Chargement eventuel des données en cookies


?>

<style>
    .inscription-a {
        text-decoration: underline;
    }
</style>
<div id="corps">
    <h1 class="title">2IQuizz</h1>
    <h2 class="title-h2">Inscription</h2>
    <?php if($message=valider('message')){
        echo $message;
    }
    ?>
    <div class="Form">
        <form action="controleur.php" method="GET">
            <label for="login"> Nom d'utilisateur : </label><br/>
            <input type="text" id="login2" name="login2"/><br/><br/>
            <label for="passe">Mot de passe : </label><br/>
            <input type="password" id="passe2" name="passe2"/><br/><br/>
            <label for="pseudo">Pseudo : </label><br/>
            <input type="text" id="pseudo2" name="pseudo2"/><br/><br/>
            <input type="submit" name="action" value="Inscription"/>
        </form>
    </div>


</div>
</body>