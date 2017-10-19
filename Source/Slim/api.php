<?php

error_reporting(E_WARNING);
ini_set('default_charset','UTF-8');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

//$oi = VooDAO::pegarVoos("2017-09-19", "Congonhas","Los Angeles");
//print_r($oi);


$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


$app->get('/getVooById/{id}', function (Request $request, Response $response) {
    
    require_once('../Dao/AeroportoDAO.php');
    require_once('../Dao/AviaoDAO.php');
    require_once('../Dao/ClienteDAO.php');
    require_once('../Dao/VooDAO.php');
    
    $id = $request->getAttribute('id');
    
    $voos = VooDAO::pegarVooPorId($id);   
   
    $i = 0;
    foreach ($voos as $voo) {
        $list[$i] = array(
            'idVoo' => $voo->getId(), 
            'codigo' => $voo->getCodigo(),
            'partida' => $voo->getHorarioPartida(),
            'chegada' => $voo->getHorarioChegada(),
            'preco' => $voo->getPreco(),
            'aeroporto_partida' => $voo->getAeroportoOrigem()->getNome(),
            'cidade_partida' => $voo->getAeroportoOrigem()->getCidade(),
            'estado_partida' => $voo->getAeroportoOrigem()->getEstado(),
            'pais_partida' => $voo->getAeroportoOrigem()->getPais(),
            'sigla_aeroporto_partida' =>$voo->getAeroportoOrigem()->getSigla(),
            'aeroporto_destino' => $voo->getAeroportoDestino()->getNome(),
            'cidade_destino' => $voo->getAeroportoDestino()->getCidade(),
            'estado_destino' => $voo->getAeroportoDestino()->getEstado(),
            'pais_destino' => $voo->getAeroportoDestino()->getPais(),
            'sigla_aeroporto_destino' =>$voo->getAeroportoDestino()->getSigla(),
            'modelo_aviao' => $voo->getAviao()->getModelo(),
            'capacidade_aviao' => $voo->getAviao()->getCapacidade(),
            'fabricante_aviao' => $voo->getAviao()->getFabricante()
            );
        $i++;
    }    
    $response->getBody()->write(json_encode($list,JSON_UNESCAPED_UNICODE));

    return $response;//->withHeader('Content-type','application/json; charset=utf-8');
});


$app->get('/getVoos/{data}/{origem}/{destino}', function (Request $request, Response $response) {

    require_once('../Dao/AeroportoDAO.php');
    require_once('../Dao/AviaoDAO.php');
    require_once('../Dao/ClienteDAO.php');
    require_once('../Dao/VooDAO.php');

    $data = $request->getAttribute('data');
    $origem = $request->getAttribute('origem');
    $destino = $request->getAttribute('destino');
    
    
    
    

    $voos = VooDAO::pegarVoos($data, $origem, $destino);
//"2017-09-19", "Congonhas","Los Angeles"	
    
    
    $i = 0;
    foreach ($voos as $voo) {
        $list[$i] = array(
                            'idVoo' => $voo->getId(), 
                            'codigo' => $voo->getCodigo(),
                            'partida' => $voo->getHorarioPartida(),
                            'chegada' => $voo->getHorarioChegada(),
                            'preco' => $voo->getPreco(),
                            'aeroporto_partida' => $voo->getAeroportoOrigem()->getNome(),
                            'cidade_partida' => $voo->getAeroportoOrigem()->getCidade(),
                            'estado_partida' => $voo->getAeroportoOrigem()->getEstado(),
                            'pais_partida' => $voo->getAeroportoOrigem()->getPais(),
                            'sigla_aeroporto_partida' =>$voo->getAeroportoOrigem()->getSigla(),
                            'aeroporto_destino' => $voo->getAeroportoDestino()->getNome(),
                            'cidade_destino' => $voo->getAeroportoDestino()->getCidade(),
                            'estado_destino' => $voo->getAeroportoDestino()->getEstado(),
                            'pais_destino' => $voo->getAeroportoDestino()->getPais(),
                            'sigla_aeroporto_destino' =>$voo->getAeroportoDestino()->getSigla(),
                            'modelo_aviao' => $voo->getAviao()->getModelo(),
                            'capacidade_aviao' => $voo->getAviao()->getCapacidade(),
                            'fabricante_aviao' => $voo->getAviao()->getFabricante()
                );
        $i++;
    }    
	$response->getBody()->write(json_encode($list));

    return $response;

});



$app->get('/getTodosVoos', function (Request $request, Response $response) {
    

    require_once('../Dao/AeroportoDAO.php');
    require_once('../Dao/AviaoDAO.php');
    require_once('../Dao/ClienteDAO.php');
    require_once('../Dao/VooDAO.php');

    $voos = VooDAO::pegarTodosVoos();
        
    $i = 0;
    foreach ($voos as $voo) {
        $list[$i] = array(
                            'idVoo' => $voo->getId(), 
                            'codigo' => $voo->getCodigo(),
                            'partida' => $voo->getHorarioPartida(),
                            'chegada' => $voo->getHorarioChegada(),
                            'preco' => $voo->getPreco(),
                            'aeroporto_partida' => $voo->getAeroportoOrigem()->getNome(),
                            'cidade_partida' => $voo->getAeroportoOrigem()->getCidade(),
                            'estado_partida' => $voo->getAeroportoOrigem()->getEstado(),
                            'pais_partida' => $voo->getAeroportoOrigem()->getPais(),
                            'sigla_aeroporto_partida' =>$voo->getAeroportoOrigem()->getSigla(),
                            'aeroporto_destino' => $voo->getAeroportoDestino()->getNome(),
                            'cidade_destino' => $voo->getAeroportoDestino()->getCidade(),
                            'estado_destino' => $voo->getAeroportoDestino()->getEstado(),
                            'pais_destino' => $voo->getAeroportoDestino()->getPais(),
                            'sigla_aeroporto_destino' =>$voo->getAeroportoDestino()->getSigla(),
                            'modelo_aviao' => $voo->getAviao()->getModelo(),
                            'capacidade_aviao' => $voo->getAviao()->getCapacidade(),
                            'fabricante_aviao' => $voo->getAviao()->getFabricante()
                );
        $i++;
    }    
	
	$response->getBody()->write(json_encode($list));

    return $response;
});

$app->get('/inserirTicket/{idCompra}/{idVoo}/{numeroAssento}/{idPassageiro}', function (Request $request, Response $response) {
    
    require_once('../Dao/VooDAO.php');
    require_once('../Dao/TicketDAO.php');
    
    $idCompra = $request->getAttribute('idCompra');
    $idVoo = $request->getAttribute('idVoo');
    $numeroAssento = $request->getAttribute('numeroAssento');
    $idPassageiro = $request->getAttribute('idPassageiro');
    $desconto = 0;
    
    TicketDAO::inserirTicket($idVoo, $numeroAssento, $desconto, $idCompra, $idPassageiro);

});


$app->get('/inserirCompra/{numCartao}/{idCliente}', function (Request $request, Response $response) {
    
    require_once('../Dao/VooDAO.php');
    require_once('../Dao/CompraDAO.php');
    
    $numCartao = $request->getAttribute('numCartao');
    $idCliente = $request->getAttribute('idCliente');
    
    CompraDAO::inserirCompra($numCartao, $idCliente);    

});


$app->get('/inserirPassageiro/{nome}/{cpf}/{dataNascimento}', function (Request $request, Response $response) {
        
    require_once('../Dao/VooDAO.php');
    require_once('../Dao/PassageiroDAO.php');
    
    $nome = $request->getAttribute('nome');
    $cpf = $request->getAttribute('cpf');
    $dataNascimento = $request->getAttribute('dataNascimento');
        
    PassageiroDAO::inserirPassageiro($cpf, $nome, $dataNascimento);  
    
});

$app->run();
