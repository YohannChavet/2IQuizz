<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<style>
    .connexion-a {
        text-decoration:underline;
</style>
<div id="corps">

<h1>Connexion</h1>

<div class="Form">
<form action="controleur.php" method="GET">
<label for="login"> Nom d'utilisateur : </label><input type="text" id="login" name="login" value="<?php echo $login;?>" /><br />
<label for="passe">Mot de passe : </label><input type="password" id="passe" name="passe" value="<?php echo $passe;?>" /><br />
<label for="remember">Se souvenir de moi </label><input type="checkbox" <?php echo $checked;?> name="remember" id="remember" value="ok"/> <br />

<input type="submit" name="action" value="Connexion" />
</form>
</div>


</div>