<?php

class Consulta extends Basedados {

  public function getConsultaEnf($idConsulta) {
    $sql = "SELECT * FROM Consulta_Enfermeiro WHERE idConsulta = $idConsulta";
    return $this->executarQuery($sql);
  }

  public function getTodasConsultEnf() {
    $sql = "SELECT CE.idConsulta, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 2";
    return $this->executarQuery($sql);
  }

  public function getTratamentos() {
    $sql = "SELECT * FROM Tratamentos";
    return $this->executarQuery($sql);
  }

  public function getEstados() {
    $sql = "SELECT * FROM estadoConsultas";
    return $this->executarQuery($sql);
  }

  public function getEspecialidades() {
    $sql = "SELECT * FROM Especialidades";
    return $this->executarQuery($sql);
  }

  public function getConsultaMed($idConsulta) {
    $sql = "SELECT * FROM Consulta_Medicos WHERE idConsulta = $idConsulta";
    return $this->executarQuery($sql);
  }

  public function getTodasConsultMed() {
    $sql = "SELECT CM.idConsulta, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 2";
    return $this->executarQuery($sql);
  }

  public function getEscalaMed($id) {
    $sql = "SELECT CM.idConsulta, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 2 AND CM.idMedico = '$id'";
    return $this->executarQuery($sql);
  }

  public function getEscalaEnf($id) {
    $sql = "SELECT CE.idConsulta, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 2 AND CE.idEnfermeiro = '$id'";
    return $this->executarQuery($sql);
  }

  public function getTodosEnf() {
    $sql = "SELECT * FROM utilizador WHERE tipoUtilizador = '3'";
    return $this->executarQuery($sql);
  }

  public function getTodosMed() {
    $sql = "SELECT * FROM utilizador WHERE tipoUtilizador = '2'";
    return $this->executarQuery($sql);
  }

  public function getTratamentosConcluidas() {
    $sql = "SELECT CE.idConsulta, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 3";
    return $this->executarQuery($sql);
  }

  public function getConsultasConcluidas() {
    $sql = "SELECT CM.idConsulta, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 3";
    return $this->executarQuery($sql);
  }

  public function getTratamentosPorAprovar() {
    $sql = "SELECT CE.idConsulta, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 1";
    return $this->executarQuery($sql);
  }

  public function getConsultasPorAprovar() {
    $sql = "SELECT CM.idConsulta, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 1";
    return $this->executarQuery($sql);
  }

  public function getConsultasMarcadasUtilizador($id) {
    $sql = "SELECT CM.idConsulta, CM.idUtilizador, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 2 AND CM.idUtilizador = $id";
    return $this->executarQuery($sql);
  }

  public function getTratamentosMarcadosUtilizador($id) {
    $sql = "SELECT CE.idConsulta, CE.idUtilizador, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 2 AND CE.idUtilizador = $id";
    return $this->executarQuery($sql);
  }

  public function getConsultasConcluidasUtilizador($id) {
    $sql = "SELECT CM.idConsulta, CM.idUtilizador, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 2 AND CM.idUtilizador = $id";
    return $this->executarQuery($sql);
  }

  public function getTratamentosConcluidosUtilizador($id) {
    $sql = "SELECT CE.idConsulta, CE.idUtilizador, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 2 AND CE.idUtilizador = $id";
    return $this->executarQuery($sql);
  }

  public function getConsultasConcluidasMed($id) {
    $sql = "SELECT CM.idConsulta, CM.idMedico, CM.data, CM.estado, U.nome utente, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador AND estado = 3 AND CM.idMedico = $id";
    return $this->executarQuery($sql);
  }

  public function getTratamentosConcluidosEnf($id) {
    $sql = "SELECT CE.idConsulta, CE.idEnfermeiro, CE.data, CE.estado, U.nome utente, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador AND estado = 3 AND CE.idEnfermeiro = $id";
    return $this->executarQuery($sql);
  }

  //Gestão
  public function inserirTratamento($dados) {
    $sql = "INSERT INTO Consulta_Enfermeiro (idUtilizador, idTratamento, idEnfermeiro, data, estado) VALUES (:idUtilizador, :idTratamento, :idEnfermeiro, :data, :estado)";
    return $this->updateQuery($sql, $dados);
  }

  public function inserirConsulta($dados) {
    $sql = "INSERT INTO Consulta_Medicos (idUtilizador, idEspecialidade, idMedico, data, estado) VALUES (:idUtilizador, :idEspecialidade, :idMedico, :data, :estado)";
    return $this->updateQuery($sql, $dados);
  }

  public function editarTratamento($id, $dados) {
    $sql = "UPDATE Consulta_Enfermeiro SET idTratamento = :idTratamento, idEnfermeiro = :idEnfermeiro, data = :data, estado = :idEstado WHERE idConsulta = '$id'";
    return $this->updateQuery($sql, $dados);
  }

  public function editarConsulta($id, $dados) {
    $sql = "UPDATE Consulta_Medicos SET idEspecialidade = :idEspecialidade, idMedico = :idMedico, data = :data, estado = :idEstado WHERE idConsulta = '$id'";
    return $this->updateQuery($sql, $dados);
  }

  public function eliminarTratamento($id) {
    $sql = "UPDATE Consulta_Enfermeiro SET estado = 4 WHERE idConsulta = '$id'";
    return $this->updateQuery($sql);
  }

  public function eliminarConsulta($id) {
    $sql = "UPDATE Consulta_Medicos SET estado = 4 WHERE idConsulta = '$id'";
    return $this->updateQuery($sql);
  }

  public function concluirTratamento($id) {
    $sql = "UPDATE Consulta_Enfermeiro SET estado = 3 WHERE idConsulta = '$id'";
    return $this->updateQuery($sql);
  }

  public function concluirConsulta($id) {
    $sql = "UPDATE Consulta_Medicos SET estado = 3 WHERE idConsulta = '$id'";
    return $this->updateQuery($sql);
  }

  //Botões de gestão
  public function botaoEditarEnf($id) {
    return '
    <a href="?menu=editarTratamento&id='.$id.'&tipo=tratamento" class="button is-link is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-alt"></i>
    </span>
    <span>Editar tratamento</span>
    </a>
    ';
  }

  public function botaoEliminarEnf($id) {
    return '
    <a href="../backend/eliminar-consulta.php?id='.$id.'&tipo=tratamento" class="button is-danger is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-times"></i>
    </span>
    <span>Eliminar consulta</span>
    </a>
    ';
  }

  public function mostrarBotoesEnf($id) {
    echo $this->botaoEditarEnf($id);
    echo $this->botaoEliminarEnf($id);
  }

  public function botaoEditarMed($id) {
    return '
    <a href="?menu=editarTratamento&id='.$id.'&tipo=consulta" class="button is-link is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-alt"></i>
    </span>
    <span>Editar consulta</span>
    </a>
    ';
  }

  public function botaoEliminarMed($id) {
    return '
    <a href="../backend/eliminar-consulta.php?id='.$id.'&tipo=consulta" class="button is-danger is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-times"></i>
    </span>
    <span>Eliminar consulta</span>
    </a>
    ';
  }

  public function botaoConcluirConsulta($id, $tipo) {
    return '
    <a href="../backend/concluir-consulta.php?id='.$id.'&tipo='.$tipo.'" class="button is-success is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-alt"></i>
    </span>
    <span>Concluir consulta</span>
    </a>
    ';
  }

  public function mostrarBotoesMed($id) {
    echo $this->botaoEditarMed($id);
    echo $this->botaoEliminarMed($id);
  }
}