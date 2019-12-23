<?php 

require_once '../config/init.php';

$consulta = new Consulta;

$enfermeiros = $consulta->getTodosEnf();
$tratamentos = $consulta->getTratamentos();

if(isset($_GET["tipo"])) {
  switch($_GET["tipo"]) {
    case 'tratamento':
      $dados = $consulta->getConsultaEnf($_GET["id"])[0];
    break;
    case 'consulta';
      $dados = $consulta->getConsultaMed($_GET["id"][0]);
    break;
  }
}
$data = explode(' ', $dados->data);
$splitHora = explode(':', $data[1]);
$hora = $splitHora[0] . ":" . $splitHora[1];
?>

<form action="editar-consulta.php?id=" method="post">
  <div class="field">
    <label class="label">Data:</label>
    <div class="control has-icons-left">
      <input name="userName" type="date" class="input" value="<?php echo date("Y-m-d", strtotime($data[0])); ?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-calendar-alt"></i>
      </span>
    </div>
  </div>

  <div class="field">
    <label class="label">Hora:</label>
    <div class="control has-icons-left">
      <input name="userName" type="time" step="900" class="input" value="<?php echo $hora; ?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-clock"></i>
      </span>
    </div>
  </div>

  <div class="field">
    <label class="label">Enfermeiro:</label>
    <div class="select">
      <select name="enfermeiros">
        <?php foreach($enfermeiros as $enfermeiro): ?>
        <option value="<?php echo $enfermeiro->idUtilizador ?>"><?php echo $enfermeiro->nome ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="field">
    <label class="label">Tratamento:</label>
    <div class="select">
      <select name="enfermeiros">
        <?php foreach($tratamentos as $tratamento): ?>
        <option value="<?php echo $tratamento->idTratamento ?>"><?php echo $tratamento->descricao ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="field">
    <div class="control">
      <a href="javascript:history.go(-1)" class="button is-normal">Cancelar</a>
      <input type="submit" class="button is-link" value="Guardar">
    </div>
  </div>

</form>