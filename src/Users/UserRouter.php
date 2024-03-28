<?php

class UserRouter {
  private $path;
  private $postData;
  private $userController;
  private $REQUEST_METHOD;

  private $pathExploded;
  public function __construct($path, $postData, $request) {

    include_once "UserController.php";
    include_once "UserService.php";
    $userService = new UserService();
    $this->userController = new UserController($userService);

    $this->path = $path;
    $this->postData = $postData;

    $this->REQUEST_METHOD = $request;

    $this->pathExploded = explode("/", $path);
  }

  public function loadRoute() {
    switch ($this->path) {
      case "users/list":
        if($this->REQUEST_METHOD== "GET") {
          $this->userController->usersList();
        }
        break;
      case "users/create":
        if($this->REQUEST_METHOD== "POST") {
          
        }
        break;
      case $this->pathExploded[0] == "users" && $this->pathExploded[1] == "findname": // it becomes with params
        if($this->REQUEST_METHOD == "GET") {
          $param = explode("/", $this->path)[2];
          $this->userController->findUserByName($param);
        }
      break;
    }
  }
}