<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  session_start();
  $user = new Utilizador;
  if($user->eliminarPermanente($_GET["id"])) {
    $_SESSION["mensagem"] = "utilizador-eliminado-permanente";
    echo "<script>window.history.back();</script>";
  }
}