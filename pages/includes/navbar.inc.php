<?php 

if(!isset($_SESSION["id"])) {
	session_start();
}

function definirUrl() {
	switch($_SESSION["tipoUtilizador"]) {
		case "1":
			echo('admin.php');
		break;
		case "2":
			echo('medico.php');
		break;
		case "3":
			echo('enfermeiro.php');
		break;
		case "5":
			echo('utente.php');
		break;
		default:
			echo('index.php');
		break;
	}
}

?>

<nav class="navbar is-link is-fixed-top" role="navigation">
	<div class="container">
	  <div class="navbar-brand">
	    <a href=<?php echo('index.php') ?> class="navbar-item"><strong>EST</strong>Clinic</a>	
	    <!--Adicionar class 'is-active' para mostrar X-->
	    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	    </a>
	  </div>
	  <div class="navbar-end">
			<?php 
			if(isset($_SESSION["id"])) { ?>
				<a href=<?php definirUrl() ?> class="navbar-item"><?php echo($_SESSION['nome']) ?><span class="icon" style="margin-left: 2px"><i class="fas fa-user-circle"></i></span></a>
				<a href=<?php echo('logout.php') ?> class="navbar-item">Sair<span class="icon" style="margin-left: 3px"><i class="fas fa-sign-out-alt"></i></span></a> <?php
			} else { ?>
				<a href=<?php echo('login.php') ?> class="navbar-item">Iniciar Sessão<span class="icon" style="margin-left: 3px"><i class="fas fa-user-circle"></i></span></a>
				<a href=<?php echo('registo.php') ?> class="navbar-item">Criar Conta<span class="icon" style="margin-left: 3px"><i class="fas fa-pen-square"></i></span></a> <?php
			}
			?>
	  </div>
	</div>
</nav>

<script type="text/javascript">
      (function() {
        var burger = document.querySelector('.burger');
        var nav = document.querySelector('#'+burger.dataset.target);
        burger.addEventListener('click', function(){
          burger.classList.toggle('is-active');
          nav.classList.toggle('is-active');
        });
      })();
</script>