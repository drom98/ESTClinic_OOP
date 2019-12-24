<?php 

$user = new Utilizador;
$utilizadoresPorAprovar = $user->getUsersPorAprovar();

$tabelaVazia = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

?>
<?php if($utilizadoresPorAprovar): ?>
<?php $nrUtilizadores = count($utilizadoresPorAprovar); ?>

<?php 
  $itemsLeft = array(
    '<p class="subtitle is-size-5"><strong>'. $nrUtilizadores .'</strong> Utilizador(es) por aprovar</p>'
  );
  $infoTabela = new InfoTabela($itemsLeft);
  $infoTabela->render(); 
?>
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
<?php else: $tabelaVazia->getMensagem(); ?>
<?php endif; ?>