<?php

class UserService {
  private $dbConnection;

  public function __construct() {
    $this->dbConnection = new DbConnectionService();
  }
  public function listUsers(){
    $sql = "SELECT * FROM users ORDER BY username";
    $results = $this->dbConnection->queryExec( $sql );
    $object = $results->fetchAll( PDO::FETCH_ASSOC );
    return $object;
  }
  public function getById($id) {
    $sql = "SELECT * FROM users where id = {$id}";
    $queryResults = $this->dbConnection->queryExec($sql);
    return $queryResults;
  }

  public function getByName($name){
    $sql = "SELECT * FROM users WHERE username LIKE  '%{$name}%';";
    $queryResults = $this->dbConnection->queryExec($sql);
    $object = $queryResults->fetchAll( PDO::FETCH_ASSOC ); // this associate the index with property name
    return $object;
  }

  public function insertUser() {}

}