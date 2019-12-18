<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
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
</body>
</html>