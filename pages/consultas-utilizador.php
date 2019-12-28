<?php

//Criar objeto da classe Consulta
$consultas = new Consulta;
$consultasMarcadasUtilizador = $consultas->getConsultasMarcadasUtilizador($_SESSION["id"]);
$tratamentosMarcadosUtilizador = $consultas->getTratamentosMarcadosUtilizador($_SESSION["id"]);

?>

<?php 

if($tratamentosMarcadosUtilizador) {
  $nr = count($tratamentosMarcadosUtilizador);
  $itemsLeft = array(
    '<p class="subtitle is-size-5"><strong>'.$nr.'</strong> tratamento(s) marcados</p>',
  );
  $infoTabela = new InfoTabela($itemsLeft);
  tabelaTratamentosMarcados();
} else {
  $tabelaVazia = new Mensagem("Sem tratamentos", "link", "Não tem nenhum tratamento marcado.");
  $tabelaVazia->render();
}
?> <hr> <?php
if($consultasMarcadasUtilizador) {
  $nr = count($consultasMarcadasUtilizador);
  $itemsLeft = array(
    '<p class="subtitle is-size-5"><strong>'.$nr.'</strong> consulta(s) marcadas</p>',
  );
  $infoTabela = new InfoTabela($itemsLeft);
  tabelaConsultasMarcadas();
} else {
  $tabelaVazia = new Mensagem("Sem consultas", "link", "Não tem nenhuma consulta marcada.");
  $tabelaVazia->render();
}

function tabelaTratamentosMarcados() {
  global $consultas, $tratamentosMarcadosUtilizador;
  ?>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>Data</abbr></th>
        <th>Nome utente</abbr></th>
        <th>Nome enfermeiro</abbr></th>
        <th>Tratamento</abbr></th>
        <th>Opções</abbr></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tratamentosMarcadosUtilizador as $consulta): ?>
      <tr>
        <td><?php echo $consulta->data ?></td>
        <td><?php echo $consulta->utente ?></td>
        <td><?php echo $consulta->nome ?></td>
        <td><?php echo $consulta->descricao ?></td>
        <td><?php echo $consultas->mostrarBotoesEnf($consulta->idConsulta); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
}

function tabelaConsultasMarcadas() {
  global $consultas, $consultasMarcadasUtilizador;
  ?>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>Data</abbr></th>
        <th>Nome utente</abbr></th>
        <th>Nome médico</abbr></th>
        <th>Especialidade</abbr></th>
        <th>Opções</abbr></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($consultasMarcadasUtilizador as $consulta): ?>
      <tr>
        <td><?php echo $consulta->data ?></td>
        <td><?php echo $consulta->utente ?></td>
        <td><?php echo $consulta->nome ?></td>
        <td><?php echo $consulta->descricao ?></td>
        <td><?php echo $consultas->mostrarBotoesMed($consulta->idConsulta); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
}

?>