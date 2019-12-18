<?php

class Consulta extends Basedados {

  public function getConsultaEnf($idConsulta) {
    $sql = "SELECT * FROM Consulta_Enfermeiro WHERE idConsulta = $idConsulta";
    return $this->executarQuery($sql);
  }

  public function getTodasConsultEnf() {
    $sql = "SELECT CE.data, CE.estado, U.nome, T.descricao, UE.nome FROM Consulta_Enfermeiro CE, utilizador U, Tratamentos T, utilizador UE 
    WHERE CE.idUtilizador = U.idUtilizador AND 
    CE.idTratamento = T.idTratamento AND
    CE.idEnfermeiro = UE.idUtilizador";
    return $this->executarQuery($sql);
  }

  public function getConsultaMed($idConsulta) {
    $sql = "SELECT * FROM Consulta_Medicos WHERE idConsulta = $idConsulta";
    return $this->executarQuery($sql);
  }

  public function getTodasConsultMed() {
    $sql = "SELECT * FROM Consulta_Medicos";
    return $this->executarQuery($sql);
  }
}