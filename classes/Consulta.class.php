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
    CE.idEnfermeiro = UE.idUtilizador";
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

  public function getConsultaMed($idConsulta) {
    $sql = "SELECT * FROM Consulta_Medicos WHERE idConsulta = $idConsulta";
    return $this->executarQuery($sql);
  }

  public function getTodasConsultMed() {
    $sql = "SELECT CM.idConsulta, CM.data, CM.estado, U.nome, T.descricao, UM.nome FROM Consulta_Medicos CM, utilizador U, Especialidades T, utilizador UM 
    WHERE CM.idUtilizador = U.idUtilizador AND 
    CM.idEspecialidade = T.idEspecialidade AND
    CM.idMedico = UM.idUtilizador";
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
    <a href="?menu=editarUtilizador&id='.$id.'" class="button is-danger is-light is-small is-fullwidth">
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
    <a href="editar-consulta.php?id='.$id.'&tipo=consulta" class="button is-link is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-alt"></i>
    </span>
    <span>Editar consulta</span>
    </a>
    ';
  }

  public function botaoEliminarMed($id) {
    return '
    <a href="?menu=editarUtilizador&id='.$id.'" class="button is-danger is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-times"></i>
    </span>
    <span>Eliminar consulta</span>
    </a>
    ';
  }

  public function mostrarBotoesMed($id) {
    echo $this->botaoEditarMed($id);
    echo $this->botaoEliminarMed($id);
  }
}