<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=login");
    die("");
}
?>
<body>
<style>
    .accueil-a {
        text-decoration: underline;
</style>
<video playsinline="" muted="" loop="" aria-describedby="video-description-2585" class="bgvid"
       poster="./ressources/bg.png" style="width: auto;" controls autoplay>
    <source src="./ressources/bg.mp4" type="video/mp4">
</video>
<div class="layer"></div>
<div class="title-div">
    <h1 class="title">2IQuizz</h1>
</div>
<p class="principle-header-p">▼ ━ Le principe du site ━ ▼</p>
<p class="principle-p">Des QCM sur différents thèmes au choix avec possibilité d'en créer <br/>
    Testez votre culture scolaire de LE1 ou dans plein d'autres catégories ! <br/>
    Il existe différents types de quizz divers et variés <br/>
    Le site tient son nom car il vous est destiné</p> <br/>
</body>