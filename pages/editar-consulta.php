<?php 

require_once '../config/init.php';

$consulta = new Consulta;

$enfermeiros = $consulta->getTodosEnf();
$tratamentos = $consulta->getTratamentos();
$medicos = $consulta->getTodosMed();
$especialidades = $consulta->getEspecialidades();

$estados = $consulta->getEstados();

if(isset($_GET["tipo"])) {
  $id = "?id=" . $_GET["id"];
  switch($_GET["tipo"]) {
    case 'tratamento':
      $param = "&tipo=tratamento";
      $dados = $consulta->getConsultaEnf($_GET["id"])[0];
    break;
    case 'consulta':
      $param = "&tipo=consulta";
      $dados = $consulta->getConsultaMed($_GET["id"])[0];
    break;
  }
}
//Formatação da data e hora para colocar value nos inputs
$data = explode(' ', $dados->data);
$splitHora = explode(':', $data[1]);
$hora = $splitHora[0] . ":" . $splitHora[1];

?>

<div class="column is-two-thirds">

<form action="../backend/editar-consulta.php<?php echo $id . $param ?>" method="post">
  <div class="field">
    <label class="label">Data:</label>
    <div class="control has-icons-left">
      <input name="data" type="date" class="input" value="<?php echo date("Y-m-d", strtotime($data[0])); ?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-calendar-alt"></i>
      </span>
    </div>
  </div>

  <div class="field">
    <label class="label">Hora:</label>
    <div class="control has-icons-left">
      <input name="hora" type="time" step="900" class="input" value="<?php echo $hora; ?>" required>
      <span class="icon is-small is-left">
        <i class="fas fa-clock"></i>
      </span>
    </div>
  </div>
  <?php if($_GET["tipo"] == "tratamento"): ?>
  <div class="field">
    <label class="label">Enfermeiro:</label>
    <div class="select">
      <select name="enfermeiro">
        <?php foreach($enfermeiros as $enfermeiro): ?>
        <option <?php if($enfermeiro->idUtilizador == $dados->idUtilizador) echo 'selected'; ?> value="<?php echo $enfermeiro->idUtilizador ?>"><?php echo $enfermeiro->nome ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="field">
    <label class="label">Tratamento:</label>
    <div class="control">
      <div class="select">
        <select name="tratamento">
          <?php foreach($tratamentos as $tratamento): ?>
          <option <?php if($tratamento->idTratamento == $dados->idTratamento) echo 'selected'; ?> value="<?php echo $tratamento->idTratamento ?>"><?php echo $tratamento->descricao ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="field">
    <label class="label">Médico:</label>
    <div class="select">
      <select name="medico">
        <?php foreach($medicos as $medico): ?>
        <option <?php if($medico->idUtilizador == $dados->idUtilizador) echo 'selected'; ?> value="<?php echo $medico->idUtilizador ?>"><?php echo $medico->nome ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="field">
    <label class="label">Especialidade:</label>
    <div class="control">
      <div class="select">
        <select name="especialidade">
          <?php foreach($especialidades as $especialidade): ?>
          <option <?php if($especialidade->idEspecialidade == $dados->idEspecialidade) echo 'selected'; ?> value="<?php echo $especialidade->idEspecialidade ?>"><?php echo $especialidade->descricao ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if($_SESSION["tipoUtilizador"] == "1"): ?>
  <div class="field">
    <label class="label">Estado:</label>
    <div class="select">
      <select name="estado">
        <?php foreach($estados as $estado): ?>
        <option <?php if($estado->idEstado == $dados->estado) echo 'selected'; ?> value="<?php echo $estado->idEstado ?>"><?php echo $estado->descricao ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <?php endif; ?>
  <br>
  <div class="field is-grouped">
    <div class="control">
      <a href="javascript:history.go(-1)" class="button is-link is-light">Cancelar</a>
    </div>
    <div class="control">
      <button type="submit" class="button is-link">Guardar</button>
    </div>
  </div>

</form>
</div>