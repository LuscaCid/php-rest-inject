<?php
//vou trabalhar os controllers de forma injectable
require_once "src/bootstrap.php";
include_once "src/database/DbConnection.php";

header("Allow-Control-Access-Origin: *");
header("Content-type: Apliccation/json");

$rawPath = $_GET["path"];
$requestMethod = $_SERVER["REQUEST_METHOD"];
$post = $_POST;
$auth = $_SERVER["HTTP_AUTHORIZATION"];

$app = new RequestBootstrap($rawPath, $requestMethod, $post);

$app->load(); 

