<?php 

if(isset($_GET["id"]) && isset($_GET["tipo"])) {
  require_once '../config/init.php';
  $consulta = new Consulta;
  
  switch($_GET["tipo"]) {
    case 'tratamento':
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
        echo "<script>window.history.go(-2);</script>";
      } else {
        echo "erro";
      }
    break;
    case 'consulta':
      $idConsulta = $_GET["id"];
      $data = $_POST["data"] . " " . $_POST["hora"] . ":00";
      $idMedico = $_POST["medico"];
      $idEspecialidade = $_POST["especialidade"];
      $idEstado = $_POST["estado"];
    
      $dados = array(
        "idEspecialidade" => $idEspecialidade,
        "idMedico" => $idMedico,
        "data" => $data,
        "idEstado" => $idEstado
      );
      
      if($consulta->editarConsulta($idConsulta, $dados)) {
        $_SESSION["sucesso"] = "ok";
        echo "<script>window.history.go(-2);</script>";
      } else {
        echo "erro";
      }
  }
  
}