<?php

//Criar objeto da classe Consulta
$consultas = new Consulta;
$consultasEnfermeiro = $consultas->getTodasConsultEnf();
$consultasMedico = $consultas->getTodasConsultMed();
$tratamentosConcluidas = $consultas->getTratamentosConcluidas();
$consultasConcluidas = $consultas->getConsultasConcluidas();
$tratamentosPorAprovar = $consulta->getTratamentosPorAprovar();
$consultasPorAprovar = $consulta->getConsultasPorAprovar();

$tabelaVazia = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

setlocale(LC_TIME, 'pt_PT', 'portuguese');
date_default_timezone_set('Europe/Lisbon');

?>

<?php 

if(isset($_GET["estado"])) {
  switch($_GET["estado"]) {
    case 'porAprovar':
      if($tratamentosPorAprovar) {
        $nrTratamentosPorAprovar = count($tratamentosPorAprovar);
        $itemsLeft = array(
          '<p class="subtitle is-size-5"><strong>'.$nrTratamentosPorAprovar.'</strong> tratamentos por aprovar</p>',
        );
        $infoTabela = new InfoTabela($itemsLeft);
        tabelaTratamentosPorAprovar();
      } else {
        $tabelaVazia->setMensagem("Não existem tratamentos para aprovar.");
        $tabelaVazia->render();
      }
      ?>
      <hr>
      <?php
      if($consultasPorAprovar) {
        $nrConsulasPorAprovar = count($consultasPorAprovar);
        $itemsLeft = array(
          '<p class="subtitle is-size-5"><strong>'.$nrConsulasPorAprovar.'</strong> consultas por aprovar</p>',
        );
      } else {
        $tabelaVazia->setMensagem("Não existem consultas para aprovar.");
        $tabelaVazia->render();
      }
    break;
    case 'marcada':
      if($consultasEnfermeiro) {
        $nrConsultasEnf = count($consultasEnfermeiro); 
        $itemsLeft = array(
          '<p class="subtitle is-size-5"><strong>Tratamentos enfermeiros</strong></p>',
        );
        $itemsRight = array(
          '<p class="subtitle is-size-5"><strong>'.$nrConsultasEnf.'</strong> tratamentos marcados</p>',
        );
        $infoTabela = new InfoTabela($itemsLeft, $itemsRight);
        tabelaConsultasMarcadasEnf();
      } else {
          $tabelaVazia->render();
      }
      ?>
        <hr>
        <?php if($consultasMedico):
          $nrConsultasMed = count($consultasMedico); 
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>Consultas médicos</strong></p>',
          );
          $itemsRight = array(
            '<p class="subtitle is-size-5"><strong>'.$nrConsultasMed.'</strong> consultas marcadas</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft, $itemsRight);
          tabelaConsultasMarcadasMed();
          else: $tabelaVazia->setMensagem("Sem consultas para médicos.");
                $tabelaVazia->render();
        endif;
    break;
    case 'concluida': 
      if($tratamentosConcluidas) {
        $nrTratamentosConcluidos = count($tratamentosConcluidas);
        $itemsLeft = array(
          '<p class="subtitle is-size-5"><strong>Tratamentos concluidos</strong></p>',
        );
        $itemsRight = array(
          '<p class="subtitle is-size-5"><strong>'.$nrTratamentosConcluidos.'</strong> tratamentos concluidos</p>',
        );
        $infoTabela = new InfoTabela($itemsLeft, $itemsRight);
        tabelaConsultasConcluidasEnf();
      } else {
        $tabelaVazia->render();
      } 
      ?>
      <hr>
      <?php
      if($consultasConcluidas) {
        $nrConsultasConcluidas = count($consultasConcluidas);
        $itemsLeft = array(
          '<p class="subtitle is-size-5"><strong>Consultas concluidas</strong></p>',
        );
        $itemsRight = array(
          '<p class="subtitle is-size-5"><strong>'.$nrConsultasConcluidas.'</strong> consultas concluidas</p>',
        );
        $infoTabela = new InfoTabela($itemsLeft, $itemsRight);
        tabelaConsultasConcluidasMed();
      } else {
        $tabelaVazia->render();
      }
    break;
  }
}

function tabelaTratamentosPorAprovar() {
  global $consultas, $tratamentosPorAprovar;
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
      <?php foreach($tratamentosPorAprovar as $consulta): ?>
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

function tabelaConsultasPorAprovar() {
  
}

function tabelaConsultasMarcadasEnf() {
  global $consultas, $consultasEnfermeiro;
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
      <?php foreach($consultasEnfermeiro as $consulta): ?>
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

function tabelaConsultasMarcadasMed() {
  global $consultas, $consultasMedico;
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
    <?php foreach($consultasMedico as $consulta): ?>
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

function tabelaConsultasConcluidasEnf() {
  global $consultas, $tratamentosConcluidas;
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
      <?php foreach($tratamentosConcluidas as $consulta): ?>
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

function tabelaConsultasConcluidasMed() {
  global $consultas, $consultasConcluidas;
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
    <?php foreach($consultasConcluidas as $consulta): ?>
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