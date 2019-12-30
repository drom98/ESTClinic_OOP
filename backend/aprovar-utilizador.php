<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  session_start();
  $user = new Utilizador;
  if($user->aprovarUtilizador($_GET["id"])) {
    $_SESSION["mensagem"] = "utilizador-aprovado";
    echo "<script>window.history.go(-1);</script>";
  }
}