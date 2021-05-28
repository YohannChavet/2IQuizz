<?php
$user_connected = True;

echo '
  <div class="header">
    <div class="wrapper-header__left">
      <a href="">Acceuil</a>
      <a href="">Rechercher</a>
      <a href="">Mes Quizz</a>
    </div>
    <div class="wrapper-header__right">
      <a href="">Icons</a>
      <a href="">Mon Profil</a>
      <a href="">Deconnexion</a>
    </div>
  </div>
<style>
  body {
  padding: 0;
  margin: 0;
}

.header {
  width: 100%;
  position: fixed;
  background: rgb(104, 16, 65);
  display: flex;
  justify-content: space-between;
  padding: 24px 0;
  font-size: 20px;
}

.wrapper-header__left,
.wrapper-header__right {
  display: flex;
  align-self: flex-start;

flex-wrap: wrap;
}

.wrapper-header__left a,
.wrapper-header__right a {
  flex: 1 1 0;
  color: white;
  font-weight: 900;
  min-width: 150px;
  padding: 0 20px;
}

.wrapper-header__left {
  width: 60%;
}

.wrapper-header__right {
  width: 30%;
}
</style>';
?>

