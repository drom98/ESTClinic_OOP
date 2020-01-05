<?php 

session_start();

require_once '../config/init.php';

$user = new Utilizador;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $dados = array(
    "nomeUtilizador" => $_POST["userName"],
    "nome" => $_POST["nome"],
    "email" => $_POST["email"],
    "password" => md5($_POST["password"]),
    "data" => date('Y-m-d'),
    "tipoUtilizador" => $_POST["tipoUtilizador"]
  );

  if($_GET["tipo"] == "admin") {
    if($user->inserirUtilizador($dados)) {
    $_SESSION["mensagem"] = "utilizador-adicionado";
    echo "<script>window.history.go(-2);</script>";
    }
  } else {
    if($user->inserirUtilizador($dados)) {
      $user->redirect($dados['tipoUtilizador']);
    }
  }
}