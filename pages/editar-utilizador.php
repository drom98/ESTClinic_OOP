<?php 

require_once '../config/init.php';

$user = new Utilizador;
$dados = $user->getUserById($_GET["id"])[0];

?>

<form action="../backend/editar-utilizador.php?id=<?php echo $dados->idUtilizador ?>" method="POST">
    <div class="field">
      <label class="label">Nome de utilizador:</label>
      <div class="control has-icons-left">
        <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." value="<?php echo $dados->nomeUtilizador; ?>" required>
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </div>
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
    </div>

    <div class="field">
      <label class="label">Tipo de utilizador:</label>
      <div class="control">
        <input class="is-checkradio is-warning" id="admin" type="radio" name="tipoUtilizador" <?php echo ($dados->tipoUtilizador == "1") ? "checked" : '' ?> value="1">
        <label for="admin">Administrador</label>
        <input class="is-checkradio is-link" id="medico" type="radio" name="tipoUtilizador" <?php echo ($dados->tipoUtilizador ==   "2") ? "checked" : '' ?> value="2">
        <label for="medico">Médico</label>
        <input class="is-checkradio is-link" id="enfermeiro" type="radio" name="tipoUtilizador" <?php echo ($dados->tipoUtilizador ==   "3") ? "checked" : '' ?> value="3">
        <label for="enfermeiro">Enfermeiro</label>
        <input class="is-checkradio is-link" id="utente" type="radio" name="tipoUtilizador" <?php echo ($dados->tipoUtilizador ==   "5") ? "checked" : '' ?> value="5">
        <label for="utente">Utente</label>
        <input class="is-checkradio is-link" id="nao-verificado" type="radio" name="tipoUtilizador" <?php echo ($dados->tipoUtilizador ==   "4") ? "checked" : '' ?> value="4">
        <label for="nao-verificado">Não verificado</label>
      </div>
    </div>

    <div class="field">
      <div class="control">
        <a href="javascript:history.go(-1)" class="button is-normal">Cancelar</a>
        <input type="submit" class="button is-link" value="Guardar">
      </div>
    </div>
  </form>