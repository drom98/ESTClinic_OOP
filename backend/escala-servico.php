<?php 

require_once '../config/init.php';

if(isset($_GET["medico"])) {
  session_start();
  unset($_SESSION["consultas"]);
  $consulta = new Consulta;

  if(isset($_GET["tipo"])) {
    switch($_GET["tipo"]) {
      case 'medico':
        $escala = $consulta->getEscalaMed($_GET["medico"]);
        $_SESSION["consultas"] = $escala;
      break;
      case 'enfermeiro':
        $escala = $consulta->getEscalaEnf($_GET["medico"]);
        $_SESSION["consultas"] = $escala;
      break;
    }
  }
  echo "<script>window.history.go(-1);</script>";
}