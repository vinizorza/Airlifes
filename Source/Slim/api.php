<?php
error_reporting(E_WARNING);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

//$oi = VooDAO::pegarVoos("2017-09-19", "Congonhas","Los Angeles");
//print_r($oi);


$app = new \Slim\App;
$app->get('/getVoos/{data}/{origem}/{destino}', function (Request $request, Response $response) {

require_once('../Dao/VooDAO.php"');
    
    $data = $request->getAttribute('data');
    $origem = $request->getAttribute('origem');
    $destino = $request->getAttribute('destino');
    
    @$voos = VooDAO::pegarVoos($data, $origem,$destino);
    //$response->getBody()->write($voos);
    //"2017-09-19", "Congonhas","Los Angeles"	
    
    
    return json_encode(print_r($voos));
});

$app->get('/teste', function (Request $request, Response $response) {
  
    echo "tetete";
});

$app->run();