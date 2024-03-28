<?php

class UserController {
  private $userService;
  public function __construct(UserService $UserService) {
    $this->userService = new $UserService();
  }

  public function usersList() {
    $res = $this->userService->listUsers(); 
    echo json_encode(["response" => $res]);
  }

  public function findUserById($id) {
    $data = $this->userService->listUsers();
  }
  public function findUserByName($name) {
    $data = $this->userService->getByName($name);
    echo json_encode(["users"=> $data]);
  }

}