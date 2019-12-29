<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once '../config/init.php';
  $consulta = new Consulta;

  switch($_POST["tipoConsulta"]) {
    case 'tratamento':
      $idUtilizador = $_SESSION["id"];
      $idTratamento = $_POST["tratamento"];
      $idEnfermeiro = $_POST["enfermeiro"];
      $data = $_POST["data"] . " " . $_POST["hora"] . ":00";
      $estado = 2;

      $dados = array(
        "idUtilizador" => $idUtilizador,
        "idTratamento" => $idTratamento,
        "idEnfermeiro" => $idEnfermeiro,
        "data" => $data,
        "estado" => $estado
      );
      
      if($consulta->inserirTratamento($dados)) {
        $_SESSION["mensagem"] = "marcada";
        header("location: ../pages/utente.php?menu=verConsultas");
      } else {
        $_SESSION["mensagem"] = "erro";
      }
    break;
    case 'consulta':
      $idUtilizador = $_SESSION["id"];
      $idEspecialidade = $_POST["especialidade"];
      $idMedico = $_POST["medico"];
      $data = $_POST["data"] . " " . $_POST["hora"] . ":00";
      $estado = 2;

      $dados = array(
        "idUtilizador" => $idUtilizador,
        "idEspecialidade" => $idEspecialidade,
        "idMedico" => $idMedico,
        "data" => $data,
        "estado" => $estado
      );
      
      if($consulta->inserirConsulta($dados)) {
        $_SESSION["mensagem"] = "marcada";
        header("location: ../pages/utente.php?menu=verConsultas");
      } else {
        $_SESSION["mensagem"] = "erro";
      }
    break;
  }
}

