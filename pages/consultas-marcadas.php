<?php

//Instanciar objeto da classe Consulta
$consultas = new Consulta;

$consultasEnfermeiro = $consultas->getTodasConsultEnf();
$consultasMedico = $consultas->getTodasConsultMed();

$tabelaVazia = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

setlocale(LC_TIME, 'pt_PT', 'portuguese');
date_default_timezone_set('Europe/Lisbon');

?>

<?php if($consultasEnfermeiro): ?>
<?php $nrConsultasEnf = count($consultasEnfermeiro); ?>
<div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
  <div class="level-left">
    <div class="level-item">
      <p class="subtitle is-size-5"><strong>Consultas enfermeiros</strong></p>
    </div>
  </div>
  <div class="level-right">
    <p class="subtitle is-size-5"><strong><?php echo $nrConsultasEnf?></strong> tratamentos marcados</p>
  </div>
</div>
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
    <?php else: $tabelaVazia->getMensagem(); ?>
<?php endif; ?>

<hr>

<?php if($consultasMedico): ?>
<?php $nrConsultasMed = count($consultasMedico); ?>
<div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
  <div class="level-left">
    <div class="level-item">
      <p class="subtitle is-size-5"><strong>Consultas médicos</strong></p>
    </div>
  </div>
  <div class="level-right">
    <p class="subtitle is-size-5"><strong><?php echo $nrConsultasMed?></strong> consultas marcadas</p>
  </div>
</div>
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
    else: $tabelaVazia->setMensagem("Sem consultas para médicos.");
      $tabelaVazia->getMensagem(); 
    ?>
<?php endif; ?>