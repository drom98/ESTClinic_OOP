<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  $user = new Utilizador;
  if($user->eliminarUtilizador($_GET["id"])) {
    $_SESSION["sucesso"] = "ok";
    echo "<script>window.history.back();</script>";
  }
}