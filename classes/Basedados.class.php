<?php

class Basedados {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASSOWRD;
  private $dbname = DB_NAME;

  private $conn;
  public $stmt;
  public $erro;

  //Construtor
  public function __construct()
  {
    try {
      $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
      $this->conn = new PDO($dsn, $this->user, $this->pass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      $this->erro = $e->getMessage();
    }
  }

  public function executarQuery($query) {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function updateQuery($query, $dados = null) {
    $this->stmt = $this->conn->prepare($query);
    if($dados == null) {
      $this->stmt->execute();
      return $this->stmt->rowCount();
    } else {
      $this->stmt->execute($dados);
      return $this->stmt->rowCount();
    }
  }
}