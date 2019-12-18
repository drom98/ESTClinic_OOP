<?php

session_start();

require_once '../config/init.php';

//Instanciar objeto da classe Utilizador
$user = new Utilizador;
$utilizadoresAtivos = $user->getUsersAtivos();
$utilizadoresPorAprovar = $user->getUsersPorAprovar();
$utilizadoresEliminados = $user->getUsersEliminados();

$consulta = new Consulta;
$todasConsEnf = $consulta->getTodasConsultEnf();

echo "Bem vindo, " . $_SESSION["nome"];

echo "<a href='logout.php'>Terminar Sessao</a>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrador</title>
</head>
<body>
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
      <td><?php echo $user->mostrarOpcoesTabela($utilizador->idUtilizador); ?></td>
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
      <td><?php echo $user->mostrarOpcoesTabela($utilizador->idUtilizador); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<h3>Todos os utilizadores eliminados</h3>
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
      <td><?php echo $user->mostrarOpcoesTabela($utilizador->idUtilizador); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php var_dump($todasConsEnf) ?>
<?php foreach($todasConsEnf as $consulta): ?>
  <tr>
    <tr><?php echo $consulta->data ?></tr>
    <tr><?php echo $consulta->nome ?></tr>
    <tr><?php echo $consulta->estado ?></tr>
  </tr>
<?php endforeach; ?>
</body>
</html>