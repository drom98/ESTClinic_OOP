<?php

session_start();
require_once '../config/init.php';

//Instanciar objeto da classe Utilizador
$user = new Utilizador;
$utilizadoresAtivos = $user->getUsersAtivos();
$utilizadoresPorAprovar = $user->getUsersPorAprovar();
$utilizadoresEliminados = $user->getUsersEliminados();

//Instanciar objeto da classe Consulta
$consulta = new Consulta;
$todasConsEnf = $consulta->getTodasConsultEnf();
$todasConsMed = $consulta->getTodasConsultMed();
$enfermeiros = $consulta->getTodosEnf();

//Proteger página
if(isset($_SESSION["tipoUtilizador"])) {
  if($_SESSION["tipoUtilizador"] != "1") {
    $user->redirect("permissao");  
  }
} else {
  $user->redirect("permissao");
}

//Mostrar mensagens de feedback ao utilizador
if(isset($_SESSION["mensagem"])) {
  switch($_SESSION["mensagem"]) {
    case 'utilizador-editado':
      $mensagem = new Mensagem("Utilizador editado", "success", "Os dados do utilizador foram alterado com sucesso");
    break;
    case 'utilizador-eliminado':
      $mensagem = new Mensagem("Utilizador eliminado", "warning", "O utilizador foi eliminado com sucesso");
    break;
    case 'utilizador-eliminado-permanente':
      $mensagem = new Mensagem("Utilizador eliminado permanentemente", "danger", "O utilizador foi eliminado com sucesso");
    break;
    case 'utilizador-aprovado':
      $mensagem = new Mensagem("Utilizador aprovado", "success", "O utilizador foi aprovado com sucesso");
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
  $hero = new Hero("Bem vindo, " . $_SESSION["nome"], "Página de administrador", "link");
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
            case 'utilizadores':
              require_once 'includes/tabelas/tabela-utilizadores.php';
            break;
            case 'usersPorAprovar':
              require_once 'includes/tabelas/tabela-utilizadores-por-aprovar.php';
            break;
            case 'usersEliminados':
              require_once 'includes/tabelas/tabela-utilizadores-eliminados.php';
            break;
            case 'dadosPessoais':
              require_once 'dados-pessoais.php';
            break;
            case 'gerirMarcacoes':
              require_once 'consultas.php';
            break;
            case 'editarUtilizador':
              require_once 'editar-utilizador.php';
            break;
            case 'adicionarUtilizador':
              require_once 'registo.php';
            break;
            case 'editarTratamento':
              require_once 'editar-consulta.php';
            break;
            case 'escalaServico':
              require_once 'escala-servico.php';
            break;
          }
        }
        ?>
      </div>
    </div>
  </section>
</body>
</html>