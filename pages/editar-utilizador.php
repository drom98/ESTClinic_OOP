<?php 

require_once '../config/init.php';

if(isset($_GET["id"])) {
  $user = new Utilizador;
  $dados = $user->getUserById($_GET["id"])[0];

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
      $user->redirect(1);
    } else {
      echo($user->erro);
    }
  }
} else {
  header("location:javascript://history.go(-1)");
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<body>
<form action="../backend/editar-utilizador.php?id=<?php echo $dados->idUtilizador ?>" method="POST">
    <div class="field">
      <label class="label">Nome de utilizador:</label>
      <div class="control has-icons-left">
        <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." value="<?php echo $dados->nomeUtilizador; ?>" required>
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </div>
      <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
    </div>

    <div class="field">
      <label class="label">Nome:</label>
      <div class="control has-icons-left">
        <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." value="<?php echo $dados->nome; ?>" required>
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Email:</label>
      <div class="control has-icons-left">
        <input name="email" type="email" class="input" placeholder="Insira o seu email..." value="<?php echo $dados->email; ?>" required>
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Password:</label>
        <div class="control has-icons-left">
          <input name="password" type="hidden" class="input" placeholder="Insira a sua password..." value="<?php echo $dados->password; ?>">
          <input name="nova-password" type="password" class="input" placeholder="Insira a sua password...">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </div>
        <p id="password" class="help is-danger is-hidden">Password errada.</p>
    </div>

    <div class="field">
      <div class="control has-icons-left">
        <input name="tipoUtilizador" type="hidden" class="input" placeholder="Insira o seu email..." value="<?php echo $dados->tipoUtilizador; ?>">
      </div>
    </div>

    <div class="field">
      <div class="control">
        <input type="submit" class="button is-link is-fullwidth" value="Guardar">
      </div>
    </div>
  </form>
</body>
</html>