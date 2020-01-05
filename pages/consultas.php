<?php

//Criar objeto da classe Consulta
$consultas = new Consulta;
$consultasEnfermeiro = $consultas->getTodasConsultEnf();
$consultasMedico = $consultas->getTodasConsultMed();
$tratamentosConcluidas = $consultas->getTratamentosConcluidas();
$consultasConcluidas = $consultas->getConsultasConcluidas();
$tratamentosPorAprovar = $consultas->getTratamentosPorAprovar();
$consultasPorAprovar = $consultas->getConsultasPorAprovar();

$mensagem = new Mensagem("Tabela vazia", "link", "Não foram encontrados registos nesta tabela");

setlocale(LC_TIME, 'pt_PT', 'portuguese');
date_default_timezone_set('Europe/Lisbon');

switch($_SESSION["tipoUtilizador"]) {
  //Admin
  case '1':
    //Mostrar tabela consoante estado da consulta selecionado
    switch($_GET["estado"]) {
      case 'marcada':
        //## Tabela consulta médico ##
        //Verificar se existem dados para mostrar
        if(obterNumero($consultasMedico)) {
          //Mostrar informações da tabela
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($consultasMedico).'</strong> consulta(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          //Mostrar tabela
          tabelaConsultas($consultasMedico);
        } else {
          //Mostrar mensagem de tabela sem dados
          $mensagem->render();
        }
        ?> <hr> <?php
        //## Tabela tratamentos enfermeiro ##
        if(obterNumero($consultasEnfermeiro)) {
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($consultasEnfermeiro).'</strong> tratamento(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          tabelaTratamentos($consultasEnfermeiro);
        } else {
          $mensagem->render();
        }
      break;
      case 'porAprovar':
        if(obterNumero($consultasPorAprovar)) {
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($consultasPorAprovar).'</strong> consulta(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          tabelaConsultas($consultasPorAprovar);
        } else {
          //Mostrar mensagem de tabela sem dados
          $mensagem->render();
        }
        ?> <hr> <?php
        //## Tabela tratamentos enfermeiro ##
        if(obterNumero($tratamentosPorAprovar)) {
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($tratamentosPorAprovar).'</strong> tratamento(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          tabelaTratamentos($tratamentosPorAprovar);
        } else {
          $mensagem->render();
        }
      break;
      case 'concluida':
        if(obterNumero($consultasConcluidas)) {
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($consultasConcluidas).'</strong> consulta(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          tabelaConsultas($consultasConcluidas);
        } else {
          //Mostrar mensagem de tabela sem dados
          $mensagem->render();
        }
        ?> <hr> <?php
        //## Tabela tratamentos enfermeiro ##
        if(obterNumero($tratamentosConcluidas)) {
          $itemsLeft = array(
            '<p class="subtitle is-size-5"><strong>'.obterNumero($tratamentosConcluidas).'</strong> tratamento(s) por aprovar</p>',
          );
          $infoTabela = new InfoTabela($itemsLeft);
          tabelaTratamentos($tratamentosConcluidas);
        } else {
          $mensagem->render();
        }
      break;
    }
  break;
  //Médico
  case '2':

  break;
  //Enfermeiro
  case '3':

  break;
}

function obterNumero($tabela) {
  if($tabela) {
    return count($tabela);
  } else {
    return false;
  }
}

function tabelaTratamentos($dados) {
  global $consultas;
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
      <?php foreach($dados as $consulta): ?>
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

function tabelaConsultas($dados) {
  global $consultas;
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
      <?php foreach($dados as $consulta): ?>
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