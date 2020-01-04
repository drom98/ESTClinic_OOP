<?php

//Instanciar objeto da classe Consulta
$consulta = new Consulta;

//Mostrar select list case seja admin
if($_SESSION["tipoUtilizador"] == "1"): ?>

<?php endif;

switch($_SESSION["tipoUtilizador"]) {
  //Admin
  case '1':
    //Preencher select list
    if(isset($_GET["tipo"])){
      switch($_GET["tipo"]) {
        case 'medico':
          $lista = $consulta->getTodosMed();  
        break;
        case 'enfermeiro':
          $lista = $consulta->getTodosEnf();
        break;
      }
      selectList($lista);
    }

    //Verificar se o utilizador selecionou médico
    if(isset($_SESSION["consultas"])) { 
      if($_SESSION["consultas"]) {
        $consultas = $_SESSION["consultas"];
        tabela($consultas);
      } else {
        $mensagem = new Mensagem("O médico que selecionou não tem consultas marcadas.", "link");
      }
      unset($_SESSION["consultas"]);
    } else {
      $mensagem = new Mensagem("Não tem nenhum médico selecionado.", "warning");
    }
  break;
  //Medico ou Enfermeiro
  case '2':
  case '3':
    $consultas = $consulta->getEscalaMed($_SESSION["id"]);
    tabela($consultas);
  break;
}

function selectList($lista) {
  ?>
  <form action="../backend/escala-servico.php" method="GET" style="padding-bottom: 24px">
  <div class="select">
    <select name="medico">
      <?php foreach($lista as $medico): ?>
      <option value="<?php echo $medico->idUtilizador ?>"><?php echo $medico->nome ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <input type="hidden" name="tipo" value=<?php echo $_GET["tipo"] ?>>
  <button class="button" type="submit">Procurar</button>
</form>
<?php
}

function tabela($consultas) {
  ?>
  <table class="table is-bordered is-striped is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Data</abbr></th>
      <th>Nome utente</abbr></th>
      <th>Nome médico</abbr></th>
      <th>Especialidade</abbr></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($consultas as $consulta): ?>
    <tr>
      <td><?php echo $consulta->data ?></td>
      <td><?php echo $consulta->utente ?></td>
      <td><?php echo $consulta->nome ?></td>
      <td><?php echo $consulta->descricao ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
}

if(isset($mensagem)) {
  $mensagem->render();
}