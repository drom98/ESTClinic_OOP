<?php 

if(isset($_GET["id"]) && isset($_GET["tipo"])) {
  require_once '../config/init.php';
  $consulta = new Consulta;
  
  $idConsulta = $_GET["id"];
  $data = $_POST["data"] . " " . $_POST["hora"] . ":00";
  $idEnfermeiro = $_POST["enfermeiro"];
  $idTratamento = $_POST["tratamento"];
  $idEstado = $_POST["estado"];

  $dados = array(
    "idTratamento" => $idTratamento,
    "idEnfermeiro" => $idEnfermeiro,
    "data" => $data,
    "idEstado" => $idEstado
  );

  if($consulta->editarTratamento($idConsulta, $dados)) {
    $_SESSION["sucesso"] = "ok";
    header("location: ../pages/admin.php?menu=gerirMarcacoes");
  } else {
    echo "erro";
  }
  
}