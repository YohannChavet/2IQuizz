<?php

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
<style>
    .profil-a {
        text-decoration:underline;
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
        <div class="right-box"><p class="rtitle-p">Mon Profil</p></div>
    </div>
</div>
</body>