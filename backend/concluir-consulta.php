<?php

require_once '../config/init.php';

if(isset($_GET["id"])) {

  session_start();
  $consulta = new Consulta;
  
  switch($_GET["tipo"]) {
    case 'tratamento':
      if($consulta->concluirTratamento($_GET["id"])) {
        $_SESSION["mensagem"] = "consulta-concluida";
        echo "<script>window.history.go(-1);</script>";
      } else {
        $_SESSION["mensagem"] = "erro";
        echo "<script>window.history.go(-1);</script>";
      }
    break;
    case 'consulta':
      if($consulta->concluirConsulta($_GET["id"])) {
        $_SESSION["mensagem"] = "consulta-concluida";
        echo "<script>window.history.go(-1);</script>";
      } else {
        $_SESSION["mensagem"] = "erro";
        echo "<script>window.history.go(-1);</script>";
      }
    break;
  }
}