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

echo "Bem vindo, " . $_SESSION["nome"];

echo "<a href='logout.php'>Terminar Sessao</a>";

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/navbar.inc.php'; ?>
<body style="font-family: sans-serif" class="has-navbar-fixed-top">
  <h3>Todos os utilizadores ativos</h3>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nome login</abbr></th>
      <th>Nome</abbr></th>
      <th>Email</abbr></th>
      <th>Tipo</abbr></th>
      <th>Utilizador desde</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($utilizadoresAtivos as $utilizador): ?>
    <tr>
      <td><?php echo $utilizador->nomeUtilizador ?></td>
      <td><?php echo $utilizador->nome ?></td>
      <td><?php echo $utilizador->email ?></td>
      <td><?php echo $utilizador->descricao ?></td>
      <td><?php echo $utilizador->data ?></td>
      <td><?php echo $user->mostrarOpcoes($utilizador->idUtilizador); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h3>Todos os utilizadores por aprovar</h3>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nome login</abbr></th>
      <th>Nome</abbr></th>
      <th>Email</abbr></th>
      <th>Tipo</abbr></th>
      <th>Utilizador desde</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($utilizadoresPorAprovar as $utilizador): ?>
    <tr>
      <td><?php echo $utilizador->nomeUtilizador ?></td>
      <td><?php echo $utilizador->nome ?></td>
      <td><?php echo $utilizador->email ?></td>
      <td><?php echo $utilizador->descricao ?></td>
      <td><?php echo $utilizador->data ?></td>
      <td><?php echo $user->mostrarOpcoes($utilizador->idUtilizador); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<h3>Todos os utilizadores eliminados</h3>
<?php if($utilizadoresEliminados): ?>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nome login</abbr></th>
      <th>Nome</abbr></th>
      <th>Email</abbr></th>
      <th>Tipo</abbr></th>
      <th>Utilizador desde</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($utilizadoresEliminados as $utilizador): ?>
    <tr>
      <td><?php echo $utilizador->nomeUtilizador ?></td>
      <td><?php echo $utilizador->nome ?></td>
      <td><?php echo $utilizador->email ?></td>
      <td><?php echo $utilizador->descricao ?></td>
      <td><?php echo $utilizador->data ?></td>
      <td><?php echo $user->mostrarOpcoes($utilizador->idUtilizador); ?></td>
    </tr>
    <?php endforeach; endif; ?>
  </tbody>
</table>

<h3>Consultas Enfermeiro</h3>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Data</abbr></th>
      <th>Nome Enfermeiro</abbr></th>
      <th>Tratamento</abbr></th>
      <th>estado</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($todasConsEnf as $consulta): ?>
  <tr>
    <td><?php echo $consulta->data ?></td>
    <td><?php echo $consulta->nome ?></td>
    <td><?php echo $consulta->descricao ?></td>
    <td><?php echo $consulta->estado ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>

<h3>Consultas Médico</h3>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Data</abbr></th>
      <th>Nome Médico</abbr></th>
      <th>Tratamento</abbr></th>
      <th>estado</abbr></th>
      <th>Opções</abbr></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($todasConsMed as $consulta): ?>
  <tr>
    <td><?php echo $consulta->data ?></td>
    <td><?php echo $consulta->nome ?></td>
    <td><?php echo $consulta->descricao ?></td>
    <td><?php echo $consulta->estado ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
  <hr>
  <h1>Escolher enfermeiro</h1>
  <select name="enfermeiros">
  <?php foreach($enfermeiros as $enfermeiro): ?>
    <option value="<?php echo $enfermeiro->idUtilizador ?>"><?php echo $enfermeiro->nome ?></option>
  <?php endforeach; ?>
  </select>
</body>
</html>