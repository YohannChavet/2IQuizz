<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php?view=profil");
    die("");
} 
 
?>

<style>
    .profil-a {
        text-decoration: underline;
    }
</style>

<div class="flex">
    <div class="left">
    </div>
    <div class="right">
        <div class="spikes">
            <?php

            for ($i = 1; $i <= 50; $i++) {
                echo '<div class="spike"></div>';
            }
            ?>
        </div>
        <div class="right-box"><p class="rtitle-p">Mon Profil</p>
        <?php 
       if($message=valider('message')){
        echo $message;
       }
         mkForm('controleur.php', 'GET');
         mkInput('Text','PseudoQ','');
         mkInput("submit","action","Changer de Pseudo");
        endForm();
        ?>
        </div>
    </div>
</div>
</body>