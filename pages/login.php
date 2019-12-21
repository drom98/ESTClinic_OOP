<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/navbar.inc.php'; ?>
<body class="has-navbar-fixed-top">
  <section class="hero is-light is-fullheight-with-navbar">
    <div class="hero-body" id="login-container">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-half">
            <div class="card">
              <div class="card-content">
                <?php if(isset($_SESSION["id"])): ?>
                <?php require_once 'includes/mensagens/sessao-inciada.inc.php'; ?>
                <?php else: ?>
                <h1 class="title has-text-link is-4 has-text-centered">Iniciar sessão</h1>
                <h2 class="subtitle is-6 has-text-centered">Entre com a sua conta.</h2>
                <form action="../backend/login.php" method="POST">
                  <div class="field">
                    <label class="label">Nome:</label>
                    <div class="control has-icons-left">
                      <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <p id="nome" class="help is-danger is-hidden">O nome que introduziu não existe.</p>
                  </div>
                  <div class="field">
                      <label class="label">Password:</label>
                        <div class="control has-icons-left">
                          <input name="password" type="password" class="input" placeholder="Insira a sua password..." required>
                          <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </div>
                        <p id="password" class="help is-danger is-hidden">Password errada.</p>
                  </div>

                  <div class="field">
                    <div class="control">
                      <input type="submit" class="button is-link is-fullwidth" value="Entrar">
                    </div>
                  </div>
                </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>