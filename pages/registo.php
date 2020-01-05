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
                <h1 class="title has-text-link is-4 has-text-centered">Registe-se</h1>
                <h2 class="subtitle is-6 has-text-centered">Registe a sua conta.</h2>
                  <form action="../backend/registo.php" method="POST">
                    <div class="field">
                      <label class="label">Nome de utilizador:</label>
                      <div class="control has-icons-left">
                        <input name="userName" type="text" class="input" placeholder="Insira o seu nome de login..." required>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>

                    <div class="field">
                      <label class="label">Nome:</label>
                      <div class="control has-icons-left">
                        <input name="nome" type="text" class="input" placeholder="Insira o seu nome..." required>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>

                    <div class="field">
                      <label class="label">Email:</label>
                      <div class="control has-icons-left">
                        <input name="email" type="email" class="input" placeholder="Insira o seu email..." required>
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>

                    <div class="field">
                      <label class="label">Password:</label>
                        <div class="control has-icons-left">
                          <input name="password" type="password" class="input" placeholder="Insira a sua password..." required>
                          <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </div>
                    </div>
                    
                    <input type="hidden" name="tipoUtilizador" value="4">

                    <div class="field">
                      <div class="control">
                        <input type="submit" class="button is-link is-fullwidth" value="Registar">
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>