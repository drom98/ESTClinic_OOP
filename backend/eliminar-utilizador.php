<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  session_start();
  $user = new Utilizador;
  if($user->eliminarUtilizador($_GET["id"])) {
    $_SESSION["mensagem"] = "utilizador-eliminado";
    echo "<script>window.history.back();</script>";
  }
}