<?php 

session_start();

require_once '../config/init.php';

if(isset($_GET["id"])) {
  $user = new Utilizador;

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nova-password"])) {
      $password = $_POST["password"];
    } else {
      $password = md5($_POST["nova-password"]);
    }
    $dados = array(
      "nomeUtilizador" => $_POST["userName"],
      "nome" => $_POST["nome"],
      "email" => $_POST["email"],
      "password" => $password,
      "tipoUtilizador" => $_POST["tipoUtilizador"]
    );

    if($user->editarUtilizador($_GET["id"], $dados)) {
      $_SESSION["dados-editados"] = "sucesso";
      echo "<script>window.history.go(-1);</script>";
    } else {
      $_SESSION["dados-editados"] = "erro";
      echo($user->erro);
    }
  }
} else {
  echo "<script>window.history.back();</script>";
}