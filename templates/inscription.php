<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=inscription");
    die("");
}

// Chargement eventuel des données en cookies


?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<style>
    .inscription-a {
        text-decoration:underline;
</style>
<div id="corps">
    <h1 class="title">2IQuizz</h1>
    <h1 class="inscription-h1">Inscription</h1>

    <div class="Form">
        <form action="controleur.php" method="GET">
            <label for="login"> Nom d'utilisateur : </label><br/>
            <input type="text" id="login2" name="login2"/><br/><br/>
            <label for="passe">Mot de passe : </label><br/>
            <input type="text" id="passe2" name="passe2"/><br/><br/>
            <label for="pseudo">Pseudo : </label><br/>
            <input type="text" id="pseudo2" name="pseudo2"/><br/><br/>
            <input type="submit" name="action" value="Inscription"/>
        </form>
    </div>


</div>