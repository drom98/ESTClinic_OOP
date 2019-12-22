<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  $user = new Utilizador;

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nova-password"])) {
      $passowrd = $_POST["password"];
    } else {
      $passowrd = md5($_POST["nova-password"]);
    }
    $dados = array(
      "nomeUtilizador" => $_POST["userName"],
      "nome" => $_POST["nome"],
      "email" => $_POST["email"],
      "password" => $passowrd,
      "tipoUtilizador" => $_POST["tipoUtilizador"]
    );

    if($user->editarUtilizador($_GET["id"], $dados)) {
      $_SESSION["sucesso"] = "ok";
      $user->redirect(1, "menu=utilizadores");
    } else {
      echo($user->erro);
    }
  }
} else {
  echo "<script>window.history.back();</script>";
}