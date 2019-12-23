<?php 

$user = new Utilizador;
$utilizadoresEliminados = $user->getUsersEliminados();

$tabelaVazia = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

?>
<?php if($utilizadoresEliminados): ?>
<?php $nrUtilizadores = count($utilizadoresEliminados); ?>
<div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
  <div class="level-left">
    <div class="level-item">
      <p class="subtitle is-size-5"><strong><?php echo $nrUtilizadores?></strong> Utilizador(es) eliminado(s)</p>
    </div>
    <div class="level-item">
      <div class="field has-addons">
        <p class="control">
          <input id="search" class="input is-small" type="text" placeholder="Procurar utilizador">
        </p>
      </div>
    </div>
  </div>
  <div class="level-right">
    <a class="button is-link is-small" href="?menu=adicionarUtilizador">Adicionar</a>
  </div>
</div>
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
    <?php else: $tabelaVazia->getMensagem(); ?>
<?php endif; ?>