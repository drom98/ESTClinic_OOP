<?php 

require_once '../config/init.php';

$consulta = new Consulta;

$enfermeiros = $consulta->getTodosEnf();
$tratamentos = $consulta->getTratamentos();
$estados = $consulta->getEstados();

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

//Formatação da data e hora para colocar value nos inputs
$data = explode(' ', $dados->data);
$splitHora = explode(':', $data[1]);
$hora = $splitHora[0] . ":" . $splitHora[1];
?>

<div class="column is-two-thirds">

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
    <div class="control">
      <div class="select">
        <select name="enfermeiros">
          <?php foreach($tratamentos as $tratamento): ?>
          <option <?php if($tratamento->idTratamento == $dados->idTratamento) echo 'selected'; ?> value="<?php echo $tratamento->idTratamento ?>"><?php echo $tratamento->descricao ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>

  <div class="field">
    <label class="label">Estado:</label>
    <div class="select">
      <select name="enfermeiros">
        <?php foreach($estados as $estado): ?>
        <option <?php if($estado->idEstado == $dados->estado) echo 'selected'; ?> value="<?php echo $estado->idEstado ?>"><?php echo $estado->descricao ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <br>
  <div class="field is-grouped">
    <div class="control">
      <a href="javascript:history.go(-1)" class="button is-link is-light">Cancelar</a>
    </div>
    <div class="control">
      <a type="submit" class="button is-link">Guardar</a>
    </div>
  </div>

</form>
</div>