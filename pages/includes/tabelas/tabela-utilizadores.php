<?php 

$user = new Utilizador;
$utilizadoresAtivos = $user->getUsersAtivos();
$nrUtilizadores = count($utilizadoresAtivos);

$tabelaVazia = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

?>
<?php if($utilizadoresAtivos): ?>

<?php 
  $itemsLeft = array(
    '<p class="subtitle is-size-5"><strong>'. $nrUtilizadores .'</strong> Utilizador(es) ativos</p>',
    '<input id="search" class="input is-small" type="text" placeholder="Procurar utilizador">',
  );
  $itemsRight = array(
    '<a class="button is-link is-small" href="?menu=adicionarUtilizador">Adicionar</a>',
  );
  $infoTabela = new InfoTabela($itemsLeft, $itemsRight);
?>
<div class="table-container">
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
</div>
<?php else: $tabelaVazia->render(); ?>
<?php endif; ?>
