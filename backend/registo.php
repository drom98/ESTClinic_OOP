<?php 

require_once '../config/init.php';

$user = new Utilizador;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $dados = array(
    "nomeUtilizador" => $_POST["userName"],
    "nome" => $_POST["nome"],
    "email" => $_POST["email"],
    "password" => md5($_POST["password"]),
    "data" => date('Y-m-d'),
    "tipoUtilizador" => '4'
  );

  if($user->inserirUtilizador($dados)) {
    $user->redirect($dados['tipoUtilizador']);
  } else {
    $user->redirect("nome");
  }
}