<?php

if(isset($_GET["tipo"])){
  //Instanciar objeto da classe Consulta
  $consulta = new Consulta;
  switch($_GET["tipo"]) {
    case 'medico':
      $lista = $consulta->getTodosMed();  
    break;
    case 'enfermeiro':
      $lista = $consulta->getTodosEnf();
    break;
  }
}

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

<?php if(isset($_SESSION["consultas"])) { 
  if($_SESSION["consultas"]) {
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
    <?php foreach($_SESSION["consultas"] as $consulta): ?>
    <tr>
      <td><?php echo $consulta->data ?></td>
      <td><?php echo $consulta->utente ?></td>
      <td><?php echo $consulta->nome ?></td>
      <td><?php echo $consulta->descricao ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php } else {
  $mensagem = new Mensagem("O médico que selecionou não tem consultas marcadas.", "link");
  $mensagem->render();
}
} else {
  $mensagem = new Mensagem("Não tem nenhum médico selecionado.", "warning");
  $mensagem->render();
}

unset($_SESSION["consultas"]);