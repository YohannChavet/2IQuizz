<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>
<style>
    .accueil-a {
        text-decoration: underline;
    }
</style>
<div class="layer"></div>
<div class="title-div">
    <h1 class="title">2IQuizz</h1>
</div>
<p class="principle-header-p">▼ ━ Le principe du site ━ ▼</p>
<p class="principle-p">Des QCM sur différents thèmes au choix avec possibilité d'en créer <br/>
    Testez votre culture scolaire de LE1 ou dans plein d'autres catégories ! <br/>
    Différent type de quizz vous sont disponibles <br/></p> <br/>
</body>