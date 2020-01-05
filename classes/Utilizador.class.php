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
    if($this->executarQuery($sql)) {
      return $this->executarQuery($sql);
    } else {
      return false;
    }
  }

  public function getTiposUtilizador() {
    $sql = "SELECT * FROM tipoUtilizador";
    return $this->executarQuery($sql);
  }

  //CRUD
  //Inserir utilizador
  public function inserirUtilizador($dados) {
    $sql = "INSERT INTO utilizador (nomeUtilizador, nome, email, password, data, tipoUtilizador) VALUES (:nomeUtilizador, :nome, :email, :password, :data, :tipoUtilizador)";

    //Verificar se nome de utilizador já existe
    if(!$this->getUserByNomeUtilizador($dados["nomeUtilizador"])) {
      return $this->updateQuery($sql, $dados);
    } else {
      return false;
    }
  }

  //Editar utilizador
  public function editarUtilizador($id, $dados) {
    $sql = "UPDATE utilizador SET nomeUtilizador = :nomeUtilizador, nome = :nome, email = :email, password = :password, tipoUtilizador = :tipoUtilizador WHERE idUtilizador = '$id'";
    return $this->updateQuery($sql, $dados);

    //Verificar se nome de utilizador já existe
    if(!$this->getUserByNomeUtilizador($dados["nomeUtilizador"])) {
      
    } else {
      return false;
    }
  }

  //Eliminar utilizador 
  public function eliminarUtilizador($id) {
    $sql = "UPDATE utilizador SET tipoUtilizador = 6 WHERE idUtilizador = '$id'";
    return $this->updateQuery($sql);
  }

  //Eliminar permanentemente (Apagar utilizador da BD)
  public function eliminarPermanente($id) {
    $sql = "DELETE FROM utilizador WHERE idUtilizador = '$id'";
    return $this->updateQuery($sql);
  }

  //Aprovar utilizador
  public function aprovarUtilizador($id) {
    $sql = "UPDATE utilizador SET tipoUtilizador = 5 WHERE idUtilizador = '$id'";
    return $this->updateQuery($sql);
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
    $_SESSION["data"] = $utilizador->data;
  }

  //Encerrar sessão
  public function terminarSessao() {
    session_start();
    if(session_destroy()) {
      $this->redirect("logout");
    }
  }

  //Redirecionar o utilizador para a sua página consoante o seu tipo
  public function redirect($tipoUtilizador, $parametro = null) {
    switch($tipoUtilizador) {
      case '1':
        header("Location: ../pages/admin.php" . "?" . $parametro);
      break;
      case '2':
        header("Location: ../pages/medico.php");
      break;
      case '3':
        header("Location: ../pages/medico.php");
      break;
      case '4':
        header("Location: ../pages/login.php?erro=aprovar");
      break;
      case '5':
        header("Location: ../pages/utente.php");
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
  
  public function botaoEditar($id) {
    return '
    <a href="?menu=editarUtilizador&id='.$id.'" class="button is-link is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-user-edit"></i>
    </span>
    <span>Editar utilizador</span>
    </a>
    ';
  }

  public function botaoEliminar($id) {
    return '
    <a href="../backend/eliminar-utilizador.php?id='.$id.'" class="button is-danger is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-trash-alt"></i>
    </span>
    <span>Eliminar utilizador</span>
    </a>
    ';
  }

  public function botaoAprovar($id) {
    return '
    <a href="../backend/aprovar-utilizador.php?id='.$id.'" class="button is-success is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-user-check"></i>
    </span>
    <span>Aprovar utilizador</span>
    </a>
    ';
  }

  public function botaoRestaurar($id) {
    return '
    <a href="../backend/aprovar-utilizador.php?id='.$id.'" class="button is-success is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-user-check"></i>
    </span>
    <span>Restaurar utilizador</span>
    </a>
    ';
  }

  public function botaoEliminarPerma($id) {
    return '
    <a href="../backend/eliminar-perma-utilizador.php?id='.$id.'" class="button is-danger is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-trash-alt"></i>
    </span>
    <span>Eliminar permanentemente</span>
    </a>
    ';
  }

  public function mostrarOpcoes($id) {
    if(isset($_GET["menu"])) {
      $tab = $_GET["menu"];
    }

    switch($tab) {
      case 'utilizadores':
        echo $this->botaoEditar($id);
        echo $this->botaoEliminar($id);
      break;
      case 'usersPorAprovar':
        echo $this->botaoEditar($id);
        echo $this->botaoAprovar($id);
        echo $this->botaoEliminar($id);
      break;
      case 'usersEliminados':
        echo $this->botaoRestaurar($id);
        echo $this->botaoEliminarPerma($id);
    } 
  }
}
