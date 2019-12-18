<?php 

require_once '../config/init.php';

$bd = new Basedados;
$user = new Utilizador;

if(isset($_POST["nome"]) && isset($_POST["password"])) {
  $nome = $_POST["nome"];
  $password = md5($_POST["password"]);

  if($user->getUserByNomeUtilizador($nome)) {
    //Utilizador existe na BD
    $utilizador = $user->getUserByNomeUtilizador($nome)[0];
    if($password == $utilizador->password) {
      if($utilizador->tipoUtilizador != 4) {
        //Conta validada
        if($utilizador->tipoUtilizador == 6) {
          //Conta apagada
          $user->redirect($utilizador->tipoUtilizador);
        } else {
          //Definir variaves de sessao
          //Header para a pagina de utilizador
          $user->criarSessao($utilizador);
          $user->redirect($utilizador->tipoUtilizador);
        }
      } else {
        //Conta por validar
        $user->redirect($utilizador->tipoUtilizador);
      }
    } else {
      //password errada
      $user->redirect("password");
    }
  } else {
    //user não existe
    $user->redirect("nome");
  }
}

?>