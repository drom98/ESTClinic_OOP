<?php

class Menu {

  public function __construct($tipoUtilizador)
  {
    switch($tipoUtilizador) {
      case '1':
        return $this->menuAdmin();
      break;
      case '2': 
        return $this->menuMedico();
      break;
      case '3': 
        return $this->menuEnfermeiro();
      break;
      case '5':
        return $this->menuUtente();
      break;
      default:
      break;
    }
  }

  public function menuAdmin() {
    echo '
    <p class="menu-label">
    <span class="icon">
      <i class="fas fa-user-friends fa-lg has-text-link"></i>
    </span>
    Utilizadores
  </p>
  <ul class="menu-list">
    <li><a href="?menu=utilizadores" id="utilizadores">Gerir utilizadores</a></li>
    <li>
      <ul>
        <li><a href="?menu=usersPorAprovar" id="usersPorAprovar">Utilizadores por aprovar</a></li>
        <li><a href="?menu=usersEliminados" id="usersEliminados">Utilizadores eliminados</a></li>
      </ul>
    </li>
  </ul>
  
  <p class="menu-label">
    <span class="icon">
      <i class="fas fa-calendar-check fa-lg has-text-link"></i>
    </span>
    Consultas
  </p>
  <ul class="menu-list">
    <li><a href="?menu=gerirMarcacoes&estado=marcada" id="marcada">Consultas marcadas</a></li>
    <li><a href="?menu=gerirMarcacoes&estado=porAprovar" id="porAprovar">Consultas por aprovar</a></li>
    <li><a href="?menu=gerirMarcacoes&estado=concluida" id="concluida">Consultas concluidas</a></li>
  </ul>
  
  <p class="menu-label">
      <span class="icon">
          <i class="fas fa-user-md fa-lg has-text-link"></i>
        </span>
    Escalas de serviço
  </p>
  <ul class="menu-list">
    <li><a href="?menu=escalaServico&tipo=medico" id="medico">Médicos</a></li>
    <li><a href="?menu=escalaServico&tipo=enfermeiro" id="enfermeiro">Enfermeiros</a></li>
  </ul>
  
  <p class="menu-label">
      <span class="icon">
          <i class="fas fa-user-circle fa-lg has-text-link"></i>
        </span>
    Dados pessoais
  </p>
  <ul class="menu-list">
    <li><a href="?menu=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
  </ul>';
  }

  public function menuMedico() {
    echo '
    <p class="menu-label">
    <span class="icon">
      <i class="fas fa-calendar-check fa-lg has-text-link"></i>
    </span>
      Consultas
    </p>
    <ul class="menu-list">
      <li><a href="?menu=gerirMarcacoes&estado=marcada" id="marcada">Consultas marcadas</a></li>
      <li><a href="?menu=gerirMarcacoes&estado=concluida" id="concluida">Consultas concluidas</a></li>
    </ul>

    <p class="menu-label">
      <span class="icon">
        <i class="fas fa-user-md fa-lg has-text-link"></i>
      </span>
      Escala de serviço
    </p>
    <ul class="menu-list">
      <li><a href="?menu=escalaServico&tipo=medico" id="medico">Visualizar escala</a></li>
    </ul>

    <p class="menu-label">
      <span class="icon">
        <i class="fas fa-user-circle fa-lg has-text-link"></i>
      </span>
      Dados pessoais
    </p>
    <ul class="menu-list">
      <li><a href="?menu=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
    </ul>
    ';
  }

  public function menuEnfermeiro() {
    echo '
    <p class="menu-label">
    <span class="icon">
      <i class="fas fa-calendar-check fa-lg has-text-link"></i>
    </span>
      Tratamentos
    </p>
    <ul class="menu-list">
      <li><a href="?menu=gerirMarcacoes&estado=marcada" id="marcada">Tratamentos marcados</a></li>
      <li><a href="?menu=gerirMarcacoes&estado=concluida" id="concluida">Tratamentos concluidos</a></li>
    </ul>

    <p class="menu-label">
      <span class="icon">
        <i class="fas fa-user-md fa-lg has-text-link"></i>
      </span>
      Escala de serviço
    </p>
    <ul class="menu-list">
      <li><a href="?menu=escalaServico&tipo=medico" id="medico">Visualizar escala</a></li>
    </ul>

    <p class="menu-label">
      <span class="icon">
        <i class="fas fa-user-circle fa-lg has-text-link"></i>
      </span>
      Dados pessoais
    </p>
    <ul class="menu-list">
      <li><a href="?menu=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
    </ul>
    ';
  }

  public function menuUtente() {
    echo '
    <p class="menu-label">
      <span class="icon">
        <i class="fas fa-calendar-check fa-lg has-text-link"></i>
      </span>
      Consultas
    </p>
    <ul class="menu-list">
      <li><a href="?menu=marcarConsulta" id="marcarConsulta">Marcar consulta</a></li>
      <li><a href="?menu=verConsultas" id="verConsultas">Ver consultas marcadas</a></li>
    </ul>
  
    <p class="menu-label">
        <span class="icon">
            <i class="fas fa-user-circle fa-lg has-text-link"></i>
          </span>
      Dados pessoais
    </p>
    <ul class="menu-list">
      <li><a href="?menu=dadosPessoais" id="dadosPessoais">Gerir dados pessoais</a></li>
    </ul>';
  }
}