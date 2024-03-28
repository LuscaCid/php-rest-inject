<?php

class RequestBootstrap{ 
  private $path;
  private $method;
  private $post_form;
  public function __construct($path, $method, $post_form) {
    
    $this->post_form = $post_form; // formulario com os dados
    $this->path = $path; // endpoint para lidar no load e conseguir trabalhar em um controller dentro do switch
    $this->method = $method; // metodo da requisicao para lidar no controller
  }

  public function load() {
    $api_segment = explode("/", $this->path); //selecting the section
    switch ($api_segment[0]) {
      case "users":
          include_once "Users/UserRouter.php";
          $userRoutes = new UserRouter( $this->path, $this->post_form, $this->method );
          $userRoutes->loadRoute(); //this will find the route apropiate to endpoint
        break;
      case "vehicles":
        echo json_encode(["message"=> "rota veiculos"]); 
        break;
    }
  }
 }
 //in index.php its happening the initial configuration, the principle idea its to connect main with all, 
 //taking the path from server with index, method type and injecting all these inside main 