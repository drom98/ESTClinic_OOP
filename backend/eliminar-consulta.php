<?php

session_start();

require_once '../config/init.php';

if(isset($_GET["id"])) {
  $consulta = new Consulta;

  switch($_GET["tipo"]) {
    case 'tratamento':
      if($consulta->eliminarTratamento($_GET["id"])) {
        $_SESSION["mensagem"] = "tratamento-eliminado";
        echo "<script>window.history.go(-1);</script>";
      } else {
        $_SESSION["mensagem"] = "erro";
        echo "<script>window.history.go(-1);</script>";
      }
    break;
    case 'consulta':
      if($consulta->eliminarConsulta($_GET["id"])) {
        $_SESSION["mensagem"] = "consulta-eliminada";
        echo "<script>window.history.go(-1);</script>";
      } else {
        $_SESSION["mensagem"] = "erro";
        echo "<script>window.history.go(-1);</script>";
      }
    break;
  }

}