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
        $_SESSION["consulta"] = "marcada";
        header("location: ../pages/utente.php?menu=verConsultas");
      } else {
        $_SESSION["consulta"] = "erro";
      }
    break;
    case 'consulta':
      //
    break;
  }
}

