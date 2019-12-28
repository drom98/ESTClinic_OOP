<?php

//Criar objeto da classe Consulta
$consultas = new Consulta;
$consultasMarcadasUtilizador = $consultas->getConsultasMarcadasUtilizador($_SESSION["id"]);

$tabelaVazia = new Mensagem("Sem consultas", "link", "Ainda não marcou nenhuma consulta.");

echo basename($_SERVER['PHP_SELF']);

?>

<?php 

if($consultasMarcadasUtilizador) {
  $nr = count($consultasMarcadasUtilizador);
  $itemsLeft = array(
    '<p class="subtitle is-size-5"><strong>'.$nr.'</strong> consulta(s) marcadas</p>',
  );
  $infoTabela = new InfoTabela($itemsLeft);
  tabelaConsultasMarcadas();
} else {
  $tabelaVazia->render();
}

function tabelaConsultasMarcadas() {
  global $consultas, $consultasMarcadasUtilizador;
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
      <?php foreach($consultasMarcadasUtilizador as $consulta): ?>
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

?>