<!DOCTYPE html>
<html>
<?php require_once 'includes/header.inc.php'; ?>
  <body class="has-navbar-fixed-top">
    <?php require_once 'includes/navbar.inc.php'; ?>
    <section class="hero is-fullheight-with-navbar" id="main">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-desktop is-vcentered">
            <div class="column is-half">
              <h1 class="title">
                Faça a sua marcação online na EST<span class="has-text-link">Clinic</span>.
              </h1>
              <h2 class="subtitle is-5">
                  Entre com a sua conta ou registe-se para fazer a sua marcação.
              </h2>
              <a class="button is-link" href=<?php echo('login.php'); ?>>Iniciar sessão</a>
              <a class="button is-outlined is-link" href="#" style="margin-left: 1rem;">Mais informações</a>
            </div>
            <div class="column is-half is-desktop is-vcentered">
              <figure class="image">
                <img src=<?php echo('../assets/images/index.svg'); ?> alt="">
              </figure>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="info-section">
      <div class="hero is-medium is-link">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">O que temos a oferecer.</h1>
            <h2 class="subtitle">Veja as nossas especialidades, os nossos médicos e enfermeiros.</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="info-content-section">
      <div class="container">
        <div class="columns">
          <div class="column">
            <div class="card bm--card-equal-height">
              <div class="card-image">
                <figure class="image has-text-centered">
                  <span class="icon is-large has-text-link">
                    <i class="fas fa-heart fa-7x"></i>
                  </span>
                </figure>
              </div>
              <div class="card-content">
                <p class="title is-4 has-text-centered has-text-link is-spaced">As nossas especialidades</p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Cirurgia Geral
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Cirurgia Pediátrica
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Medicina Geral e Familiar
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Medicina Geral e Familiar
                </p>
              </div>
            </div>
          </div>

          <div class="column">
            <div class="card bm--card-equal-height">
              <div class="card-image">
                <figure class="image has-text-centered">
                  <span class="icon has-text-link">
                    <i class="fas fa-user-md fa-7x"></i>
                  </span>
                </figure>
              </div>
              <div class="card-content">
                <p class="title is-4 has-text-centered has-text-link is-spaced">Os nossos médicos</p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Dr. Carlos
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Dr. Carlos
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Dr. Carlos
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Dr. Carlos
                </p>
              </div>
            </div>
          </div>

          <div class="column">
            <div class="card bm--card-equal-height">
              <div class="card-image">
                <figure class="image has-text-centered">
                  <span class="icon has-text-link is-large">
                    <i class="fas fa-stethoscope fa-7x"></i>
                  </span>
                </figure>
              </div>
              <div class="card-content">
                <p class="title is-4 has-text-centered has-text-link is-spaced">Os nossos enfermeiros</p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Enf. Sérgio
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Enf. Sérgio
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Enf. Sérgio
                </p>
                <p class="subtitle has-text-centered is-size-6">
                  <i class="fas fa-check"></i>
                  Enf. Sérgio
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact-section">
      <div class="hero is-medium is-link">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">Onde nos encontramos.</h1>
            <h2 class="subtitle">Veja onde estamos ou entre em contacto connosco.</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns is-gapless is-vcentered">
          <div class="column is-2 has-text-centered">
            <figure class="image has-text-link">
              <i class="fas fa-map-marker-alt fa-3x"></i>
            </figure>
          </div>
          <div class="column">
            <p>Avenida do empresário</p>
            <p>6000-767 Castelo Branco</p>
          </div>
        </div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>

        <div class="columns is-gapless is-vcentered">
          <div class="column is-2 has-text-centered">
            <figure class="image has-text-link">
              <i class="fas fa-phone-alt fa-3x"></i>
            </figure>
          </div>
          <div class="column">
            <p><a href="tel:272 339 300">272 339 300</a></p>
          </div>
        </div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>

        <div class="columns is-gapless is-vcentered">
          <div class="column is-2 has-text-centered">
            <figure class="image has-text-link">
              <i class="fas fa-envelope fa-3x"></i>
            </figure>
          </div>
          <div class="column">
            <p><a href="mailto:est@ipcb.pt">est@ipcb.pt</a></p>
          </div>
        </div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>

      </div>
    </section>
    <footer class="footer has-text-centered">
      <div class="container">
         <div class="columns">
          <div class="column is-8-desktop is-offset-2-desktop">
            <p>
              <strong class="has-text-weight-semibold">
                <p>EST<span class="has-text-link">Clinic</span></p>
              </strong>
            </p>
            <p>
              <small>
                <p>Projeto académico desenvolvido por: Diogo Marques & Vasco Rodrigues</p>
                <p>UC: Programação Web com Bases de Dados</p>
              </small>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="lib/main.js"></script>
  </body>
</html>