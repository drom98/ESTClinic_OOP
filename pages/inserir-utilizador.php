<?php 

require_once '../config/init.php';

$user = new Utilizador;
$tipoUtilizador = $user->getTiposUtilizador();

?>

<form action="../backend/registo.php?tipo=admin" method="POST">
    <div class="field">
      <label class="label">Nome de utilizador:</label>
      <div class="control has-icons-left">
        <input name="userName" type="text" class="input" placeholder="Insira o nome de login..." required>
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Nome:</label>
      <div class="control has-icons-left">
        <input name="nome" type="text" class="input" placeholder="Insira o nome..." required>
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Email:</label>
      <div class="control has-icons-left">
        <input name="email" type="email" class="input" placeholder="Insira o email..." required>
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Password:</label>
        <div class="control has-icons-left">
          <input name="password" type="password" class="input" placeholder="Insira a password..." required>
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </div>
    </div>

    <div class="field">
      <label class="label">Tipo de utilizador:</label>
      <div class="control">
        <div class="select">
          <select name="tipoUtilizador">
            <?php foreach($tipoUtilizador as $tipo): ?>
            <option value="<?php echo $tipo->idTipoUtilizador ?>"><?php echo $tipo->descricao ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    
    <div class="field">
      <div class="control">
        <a href="javascript:history.go(-1)" class="button is-normal">Cancelar</a>
        <input type="submit" class="button is-link" value="Adicionar">
      </div>
    </div>
  </form>