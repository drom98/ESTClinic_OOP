<?php

session_start();

require_once '../config/init.php';

//Instanciar objeto da classe utilizador
$user = new Utilizador;

//Proteger página
if(isset($_SESSION["tipoUtilizador"])) {
  if($_SESSION["tipoUtilizador"] != "5") {
    $user->redirect("permissao");  
  }
} else {
  $user->redirect("permissao");
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/navbar.inc.php'; ?>
<body class="has-navbar-fixed-top">
  <?php 
  $hero = new Hero("Bem vindo, " . $_SESSION["nome"], "Página de utente", "link");
  $hero->printHero();
  ?>
  <section class="section">
    <div class="columns">
      <div class="column is-one-fifth">
        <?php new Menu($_SESSION["tipoUtilizador"]); ?>
      </div>
      <div class="column">
        <?php
        if(isset($_GET["menu"])) {
          switch($_GET["menu"]) {
            case 'marcarConsulta':
              require_once 'marcar-consulta.php';
            break;
          }
        }
        ?>
      </div>
    </div>
  </section>
</body>
</html>