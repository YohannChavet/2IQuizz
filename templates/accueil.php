<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div class="flex">
    <div class="left">
        <div class="title">
            <h1 class="title">2IQuizz</h1>
        </div>
        <p class="principle-header-p">▼  ━  Le principe du site  ━  ▼</p>
        <p class="principle-p">Des QCM sur différents thèmes au choix avec possibilité d'en créer <br/>
                Testez votre culture scolaire de LE1 ou dans plein d'autres catégories ! <br/>
                Il existe différents types de quizz divers et variés <br/>
                Le site tient son nom car il vous est destiné</p> <br/>
    </div>
    <div class="right">
        <div class="spikes">
            <?php

            for ($i = 1; $i <= 50; $i++) {
                echo '<div class="spike"></div>';
            }
            ?>
        </div>
        <div class="right-box"><p class="rtitle-p">Accueil</p></div>
    </div>
</div>
</body>