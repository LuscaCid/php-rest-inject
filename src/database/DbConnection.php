<?php

class DbConnectionService { // a instancia disso me permite executar a query
  private $PDO;

  public function __construct( ) {
    $username = "root";
    $password = "";
    $database = "api_inject";
    $host = "localhost";
    try {
      $this->PDO = new PDO("mysql:host={$host};dbname={$database}", $username, $password);
      $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      die("Erro na conexão com o banco de dados: " . $e->getMessage());
  }
  }

  public function getInstance() {
    return $this->PDO;
  }
  public function queryExec($sql) {
    $results = $this->PDO->prepare($sql);
    $results->execute();
    return $results;
  }

}