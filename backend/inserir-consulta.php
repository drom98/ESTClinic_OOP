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
      $estado = 1;

      $dados = array(
        "idUtilizador" => $idUtilizador,
        "idTratamento" => $idTratamento,
        "idEnfermeiro" => $idEnfermeiro,
        "data" => $data,
        "estado" => $estado
      );
      
      if($consulta->inserirTratamento($dados)) {
        $_SESSION["sucesso"] = "ok";
        echo "<script>window.history.go(-2);</script>";
      } else {
        echo "erro";
      }
    break;
    case 'consulta':
      //
    break;
  }
}

