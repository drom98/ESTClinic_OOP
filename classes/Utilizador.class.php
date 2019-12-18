<?php

class Utilizador extends Basedados {

  //Obter todos os utilizadores na BD
  public function getAllUsers() {
    $sql = "SELECT * FROM utilizador";
    return $this->executarQuery($sql);
  }

  //Procurar utilizador pelo ID
  public function getUserById($id) {
    $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$id'";
    return $this->executarQuery($sql);
  }

  //Procurar utilizador pelo nome de utilizador
  public function getUserByNomeUtilizador($nomeUtilizador) {
    $sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '$nomeUtilizador'";
    return $this->executarQuery($sql);
  }

  //Procurar todos os users da app
  public function getUsersAtivos() {
    $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador <> '4' AND tipoUtilizador <> '6' AND T.idTipoUtilizador = U.tipoUtilizador ORDER BY U.data";
    return $this->executarQuery($sql);
  }

  //Procurar utilizadores por aprovar
  public function getUsersPorAprovar() {
    $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador = '4' AND T.idTipoUtilizador = U.tipoUtilizador";
    return $this->executarQuery($sql);
  }

  //Procurar utilizadores eliminados
  public function getUsersEliminados() {
    $sql = "SELECT U.*, T.descricao FROM utilizador U, tipoUtilizador T WHERE tipoUtilizador = '6' AND T.idTipoUtilizador = U.tipoUtilizador";
    return $this->executarQuery($sql);
  }

  public function inserirUtilizador($dados) {
    $sql = "INSERT INTO utilizador (nomeUtilizador, nome, email, password, data, tipoUtilizador) VALUES (:nomeUtilizador, :nome, :email, :password, :data, :tipoUtilizador)";

    //Verificar se nome de utilizador já existe
    if(!$this->getUserByNomeUtilizador($dados["nomeUtilizador"])) {
      return $this->executarQuery($sql, $dados);
    } else {
      return false;
    }
  }

  //Definir as variáveis de sessão
  public function criarSessao($utilizador) {
    session_start();
    $_SESSION["id"] = $utilizador->idUtilizador;
    $_SESSION["nomeUtilizador"] = $utilizador->nomeUtilizador;
    $_SESSION["nome"] = $utilizador->nome;
    $_SESSION["email"] = $utilizador->email;
    $_SESSION["password"] = $utilizador->password;
    $_SESSION["tipoUtilizador"] = $utilizador->tipoUtilizador;
  }

  //Encerrar sessão
  public function terminarSessao() {
    session_start();
    if(session_destroy()) {
      $this->redirect("logout");
    }
  }

  //Redirecionar o utilizador para a sua página consoante o seu tipo
  public function redirect($tipoUtilizador) {
    switch($tipoUtilizador) {
      case '1':
        header("Location: ../pages/admin.php");
      break;
      case '2':
        header("Location: ../pages/medico.php");
      break;
      case '3':
        header("Location: ../pages/enfermeiro.php");
      break;
      case '4':
        header("Location: ../pages/login.php?erro=aprovar");
      break;
      case '5':
        header("Location: ../pages/utente/utente.php");
      break;
      case '6':
        header("Location: ../pages/login.php?erro=eliminado");
      break;
      case 'password':
        header("Location: ../pages/login.php?erro=password");
      break;
      case 'nome':
        header("Location: ../pages/login.php?erro=nome");
      break;
      case 'logout':
        header("Location: ../pages/login.php?erro=logout");
      break;
      case 'permissao':
        header("Location: ../pages/login.php?erro=permissao");
      break;
      default:
      break;
    }
  }
  
  public function mostrarOpcoesTabela($idUtilizador) {
    if(isset($_GET["tab"])) {
      $tab = $_GET["tab"];
    }

    switch($tab) {
      case 'usersPorAprovar':
        return '
        <button class="button is-success is-light is-small is-fullwidth" id="btnAprovarUser" name="'.($idUtilizador).'">
        <span class="icon">
          <i class="fas fa-user-check"></i>
        </span>
        <span>Aprovar utilizador</span>
      </button>
        <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-user-edit"></i>
          </span>
          <span>Editar dados</span>
        </button>
        <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-trash"></i>
          </span>
          <span>Eliminar utilizador</span>
        </button>';
      break;
      case 'usersEliminados':
        return '
        <button class="button is-success is-light is-small is-fullwidth" id="btnRestaurarUser" name="'.($idUtilizador).'">
        <span class="icon">
          <i class="fas fa-user-check"></i>
        </span>
        <span>Restaurar utilizador</span>
      </button>
        <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-user-edit"></i>
          </span>
          <span>Editar dados</span>
        </button>
        <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarPermaUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-trash"></i>
          </span>
          <span>Eliminar permanentemente</span>
        </button>';
      break;
      case 'utilizadores':
        return '
        <button class="button is-link is-light is-small is-fullwidth" id="btnEditarUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-user-edit"></i>
          </span>
          <span>Editar dados</span>
        </button>
        <button class="button is-danger is-light is-small is-fullwidth" id="btnApagarUser" name="'.($idUtilizador).'">
          <span class="icon">
            <i class="fas fa-trash"></i>
          </span>
          <span>Eliminar utilizador</span>
        </button>';
      break;
    }
  }
}
