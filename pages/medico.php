<?php

session_start();

require_once '../config/init.php';

//Instanciar objeto da classe utilizador
$user = new Utilizador;

//Proteger página
if(isset($_SESSION["tipoUtilizador"])) {
  if($_SESSION["tipoUtilizador"] != "2") {
    $user->redirect("permissao");  
  }
} else {
  $user->redirect("permissao");
}

//Mostrar mensagens de feedback ao utilizador
if(isset($_SESSION["mensagem"])) {
  switch($_SESSION["mensagem"]) {
    case 'utilizador-editado':
      $mensagem = new Mensagem("Dados alterados", "success", "Os seus dados foram alterados com sucesso");
    break;
    case 'marcada':
      $mensagem = new Mensagem("Consulta marcada", "success", "A sua consulta foi marcada com sucesso");
    break;
    case 'consulta-editada':
      $mensagem = new Mensagem("Marcação editada", "success", "A sua marcação foi editada com sucesso");
    break;
    case 'tratamento-eliminado':
      $mensagem = new Mensagem("Tratamento eliminado", "warning", "Tratamento eliminado com sucesso.");
    break;
    case 'consulta-eliminada':
      $mensagem = new Mensagem("Consulta eliminada", "warning", "Consulta eliminada com sucesso.");
    break;
    case 'erro':
      $mensagem = new Mensagem("Ocorreu um erro", "danger", "Ocorreu um erro ao efetuar a ação pretendida");
    break;
  }
  unset($_SESSION["mensagem"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/navbar.inc.php'; ?>
<body class="has-navbar-fixed-top">
  <?php 
  $hero = new Hero("Bem vindo, " . $_SESSION["nome"], "Página de médico", "link");
  $hero->printHero();
  ?>
  <section class="section">
    <div class="columns">
      <div class="column is-one-fifth">
        <?php new Menu($_SESSION["tipoUtilizador"]); ?>
      </div>
      <div class="column">
        <?php
        //Mostrar a mensagem ao utilizador
        if(isset($mensagem)):
          $mensagem->render();
        endif;

        if(isset($_GET["menu"])) {
          switch($_GET["menu"]) {
            case 'marcarConsulta':
              require_once 'marcar-consulta.php';
            break;
            case 'verConsultas':
              require_once 'consultas-utilizador.php';
            break;
            case 'editarTratamento':
              require_once 'editar-consulta.php';
            break;
            case 'dadosPessoais':
              require_once 'dados-pessoais.php';
            break;
          }
        }
        ?>
      </div>
    </div>
  </section>
</body>
</html>