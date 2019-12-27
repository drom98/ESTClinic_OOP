<?php

$consulta = new Consulta;
$tratamentos = $consulta->getTratamentos();
$especialidades = $consulta->getEspecialidades();
$enfermeiros = $consulta->getTodosEnf();
$medicos = $consulta->getTodosMed();

?>

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Marcar consulta
    </p>
  </header>
  <div class="card-content">
    <div class="content">
      <form action="">
        <div class="field">
          <label class="label">Tipo de consulta:</label>
          <div class="control">
            <input class="is-checkradio is-link" id="tratamento-radio" type="radio" name="tipoConsulta" value="1">
            <label for="tratamento-radio">Tratamento</label>
            <input class="is-checkradio is-link" id="consulta-radio" type="radio" name="tipoConsulta" value="2">
            <label for="consulta-radio">Consulta médica</label>
          </div>
        </div>

        <div class="field is-hidden" id="tipoTratamento">
          <label class="label">Tipo de tratamento:</label>
          <div class="control">
            <div class="select">
              <select name="tratamento">
                <?php foreach($tratamentos as $tratamento): ?>
                  <option value="<?php echo $tratamento->idTratamento ?>"><?php echo $tratamento->descricao ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="field is-hidden" id="tipoConsulta">
          <label class="label">Tipo de consulta:</label>
          <div class="control">
            <div class="select">
              <select name="especialidade">
              <?php foreach($especialidades as $especialidade): ?>
                <option value="<?php echo $especialidade->idEspecialidade ?>"><?php echo $especialidade->descricao ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="field is-hidden" id="enfermeiro">
          <label class="label">Enfermeiro:</label>
          <div class="control">
            <div class="select">
              <select name="enfermeiro">
              <?php foreach($enfermeiros as $enfermeiro): ?>
                <option value="<?php echo $enfermeiro->idUtilizador ?>"><?php echo $enfermeiro->nome ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="field is-hidden" id="medico">
          <label class="label">Médico:</label>
          <div class="control">
            <div class="select">
              <select>
              <?php foreach($medicos as $medico): ?>
                <option value="<?php echo $medico->idUtilizador ?>"><?php echo $medico->nome ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Data:</label>
          <div class="control">
            <input type="date">
            <input type="time">
          </div>
        </div>

        <div class="field">
          <button type="submit" class="button is-link" disabled>Submeter</button>
        </div>
      </form>
    </div>
  </div>
</div> 

<script>
//Javascript para seleção do tipo de marcação
document.addEventListener('DOMContentLoaded', () => {
  verificarOpcao();
});



const verificarOpcao = () => {
  const tipoMarcacao = document.querySelectorAll('input[name="tipoConsulta"]');
  const tipoTratamento = document.querySelector('#tipoTratamento');
  const tipoConsulta = document.querySelector('#tipoConsulta');
  const enfermeiro = document.querySelector('#enfermeiro');
  const medico = document.querySelector('#medico');

  tipoMarcacao.forEach(element => {
    element.addEventListener('change', () => {
      if(tipoMarcacao[0].checked) {
        if(!tipoConsulta.className.includes('is-hidden') || !medico.className.includes('is-hidden')) {
          tipoConsulta.classList.toggle('is-hidden');
          medico.classList.toggle('is-hidden');
        }
        tipoTratamento.classList.toggle('is-hidden');
        enfermeiro.classList.toggle('is-hidden');
      } else if(tipoMarcacao[1].checked) {
        if(!tipoTratamento.className.includes('is-hidden') || !enfermeiro.className.includes('is-hidden')) {
          tipoTratamento.classList.toggle('is-hidden');
          enfermeiro.classList.toggle('is-hidden');
        }
        tipoConsulta.classList.toggle('is-hidden');
        medico.classList.toggle('is-hidden');
      }
    })
  });
}
</script>