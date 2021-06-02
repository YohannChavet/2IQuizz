<?php
// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "quizz.php")
{
	header("Location:../index.php?view=quizz");
	die("");
}


echo $_GET['message'];
$idQuizz=$_GET['IDQuizz'];
$auteur = AuteurQuizz($_GET['IDQuizz']);
if($auteur===$_SESSION["idUser"]){
    if(IsVRaiFaux($_GET['IDQuizz'])===1){
        mkForm('controleur.php','GET');
        ?><p class="label">Indiquez le numéro de la question : </p><?php
        mkInput('number','NQues',0);
        ?><p class="label">Indiquez la question : </p><?php
        mkInput('text','Question','');
?>

<p class="label">Vrai ou Faux : </p>
<select name="VraiFaux">
    <option value="1" >Vrai</option>
    <option value="0">Faux</option>
  </select>

<?php
        mkInput('submit','action','Créer une question');
        mkInput('submit','action','Modifier une question');
        mkInput('submit','action','Supprimer la question');
        mkInput('hidden','type','VraiFaux');
        mkInput('hidden','IDQuizz',$idQuizz);
        endForm();
        $quizz=listerquestionVF($_GET['IDQuizz']);  
        echo "<table>";
        echo "<tr>
              <th scope=\"col\">Numéro</th>
              <th scope=\"col\">Question</th>
              <th scope=\"col\">Vrai/Faux</th>
              </tr>";
        foreach($quizz as $ligne){
            echo "<tr>";
            echo "<th class=\"scope\"   >";
            echo $ligne['N_Question'];
            echo "</th>";
            echo "<th>";
            echo $ligne['Question'];
            echo "</th>";
            echo "<th>";
            echo $ligne['VraiFaux'];
            echo "</th>";
            echo "</tr>";
        }
    }
else{
    mkForm('controleur.php','GET');
    ?><p class="mkquizz">Indiquez le numéro de la question : </p><?php
    mkInput('number','NQues','');
    ?><p class="mkquizz">Indiquez la question : </p><?php
    mkInput('text','Question','');
    ?><p class="mkquizz">Indiquez la réponse: </p><?php
    mkInput('text','Reponse','');
    ?><p class="mkquizz">Indiquez le choix 1 : </p><?php
    mkInput('text','CHOIX1','');
    ?><p class="mkquizz">Indiquez le choix 2 : </p><?php
    mkInput('text','CHOIX2','');
    ?><p class="mkquizz">Indiquez le choix 3 : </p><?php
    mkInput('text','CHOIX3','');
    mkInput('submit','action','Créer une question');
    mkInput('submit','action','Modifier une question');
    mkInput('submit','action','Supprimer la question');
    mkInput('hidden','type','QCM');
    mkInput('hidden','IDQuizz',$idQuizz);
    endForm();
    $quizz=listerquestionQCM($_GET['IDQuizz']);  
    echo "<table>";
    echo "<tr>
          <th scope=\"col\">Numéro</th>
          <th scope=\"col\">Question</th>
          <th scope=\"col\">Reponse</th>
          <th scope=\"col\">Choix1</th>
          <th scope=\"col\">Choix2</th>
          <th scope=\"col\">Choix3</th>
          </tr>";
    foreach($quizz as $ligne){
        echo "<tr>";
        echo "<th class=\"scope\"   >";
        echo $ligne['N_Question'];
        echo "</th>";
        echo "<th>";
        echo $ligne['Question'];
        echo "</th>";
        echo "<th>";
        echo $ligne['Reponse'];
        echo "</th>";
        echo "<th>";
        echo $ligne['CHOIX1'];
        echo "</th>";
        echo "<th>";
        echo $ligne['CHOIX2'];
        echo "</th>";
        echo "<th>";
        echo $ligne['CHOIX3'];
        echo "</th>";
        echo "</tr>";
    }
}
}
else{


    if(IsVRaiFaux($_GET['IDQuizz'])==1){
    $quizz=listerquestionVF($_GET['IDQuizz']); 
    var_dump($quizz);
    }
    else{
        
    $quizz=listerquestionQCM($_GET['IDQuizz']); 
    foreach($quizz as $ligne){
        $table=tabale();
        $asso=array(
            'Reponse' => $ligne['Reponse'],
            'PosR' => $table[0],
            'CHOIX1' => $ligne['CHOIX1'],
            'PosC1' => $table[1],
            'CHOIX2' => $ligne['CHOIX2'],
            'PosC2' => $table[2],
            'CHOIX3' => $ligne['CHOIX3'],
            'PosC3' => $table[3]
        );
    }
    mkForm('controleur.php', 'GET');
    afficherquestionQCM($quizz,$asso);
    mkInput("submit","action","valider");
    }
}

?>
</body>