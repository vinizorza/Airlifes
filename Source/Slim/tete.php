<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';


$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    
    require_once('../Dao/AeroportoDAO.php');
    require_once('../Dao/AviaoDAO.php');
    require_once('../Dao/ClienteDAO.php');
    require_once('../Dao/VooDAO.php"');    
    
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();