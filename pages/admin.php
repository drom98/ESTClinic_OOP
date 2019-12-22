<?php

session_start();
require_once '../config/init.php';

if(isset($_SESSION["sucesso"])) {
  echo "<script>location.reload();</script>";
  unset($_SESSION["sucesso"]);
}

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

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/navbar.inc.php'; ?>
<body class="has-navbar-fixed-top">
  <section class="section">
    <div class="columns">
      <div class="column is-one-fifth">
        <?php new Menu($_SESSION["tipoUtilizador"]); ?>
      </div>
      <div class="column">
        <?php 
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
          }
        }
        ?>
      </div>
    </div>
  </section>

  <hr>
  <h1>Escolher enfermeiro</h1>
  <select name="enfermeiros">
  <?php foreach($enfermeiros as $enfermeiro): ?>
    <option value="<?php echo $enfermeiro->idUtilizador ?>"><?php echo $enfermeiro->nome ?></option>
  <?php endforeach; ?>
  </select>
</body>
</html>