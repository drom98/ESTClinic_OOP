<?php 

$user = new Utilizador;
$utilizadoresEliminados = $user->getUsersEliminados();

?>
<?php if($utilizadoresEliminados): ?>
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
    <?php foreach($utilizadoresEliminados as $utilizador): ?>
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
    <?php else: echo "
      <div class='has-text-centered'>
      <span class='icon has-text-link'>
      <i class='fas fa-table fa-7x'></i>
    </span>
    <h1 class='title'>Não existem dados.</h1>
    <p class='subtitle'>Não foram encontrados registos nesta tabela.</p>
      </div>
    " ?>
<?php endif; ?>