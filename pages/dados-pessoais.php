<?php 

if(isset($_SESSION["dados-editados"])) {
  switch($_SESSION["dados-editados"]) {
    case 'sucesso':
      $mensagem = new Mensagem("Dados alterados", "success", "Alterou os seus dados com sucesso.");
      $mensagem->render();
    break;
    case 'erro':
      $mensagem = new Mensagem("Ocorreu um erro", "danger", "Ocorreu um erro ao editar os seus dados.");
      $mensagem->render();
    break;
  }
  unset($_SESSION["dados-editados"]);
}

?>


<div class="columns">
  <div class="column is-half">
    <div class="card">
      <div class="card-content">
        <div class="content has-text-centered">
          <span class="icon" style="margin-bottom: 20px;"><i class="fas fa-user-circle fa-3x"></i></span>
          <p class="has-text-weight-bold is-size-4 is-marginless"><?php echo($_SESSION["nome"]) ?></p>
          <small>Utilizador desde: <?php echo(date( 'd/M/Y', strtotime($_SESSION['data']))) ?> </small>
        </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <header class="card-header">
        <div class="card-header-title">
          Editar detalhes pessoais:
        </div>
      </header>
      <div class="card-content">
        <div class="content">
          <form action="../backend/editar-utilizador.php?id=<?php echo $_SESSION["id"]; ?>" method="POST">
            <div class="field">
              <label class="label">Nome de utilizador:</label>
              <div class="control has-icons-left">
                <input name="userName" type="text" class="input" value=<?php echo($_SESSION["nomeUtilizador"]) ?> placeholder="Insira o seu nome de login..." required>
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
            </div>
            <div class="field">
              <label class="label">Nome:</label>
              <div class="control has-icons-left">
                <input name="nome" type="text" class="input" value='<?php echo($_SESSION["nome"]) ?>' placeholder="Insira o seu nome..." required>
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
            </div>
            <div class="field">
              <label class="label">Email:</label>
              <div class="control has-icons-left">
                <input name="email" type="email" class="input" value=<?php echo($_SESSION["email"]) ?> placeholder="Insira o seu email..." required>
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
            </div>
            <div class="field">
              <label class="label">Password:</label>
              <div class="control has-icons-left">
              <input name="password" type="hidden" class="input" placeholder="Insira a sua password..." value="<?php echo $_SESSION["password"]; ?>">
                <input name="nova-password" type="password" class="input" placeholder="Insira a sua nova password...">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
              <p id="userName" class="help is-danger is-hidden">O nome que introduziu já existe.</p>
            </div>
            <input type="hidden" name="tipoUtilizador" value="<?php echo $_SESSION["tipoUtilizador"]; ?>">
            <input id="btn-dados-pessoais" type="submit" class="button is-link is-fullwidth" value="Guardar alterações">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>