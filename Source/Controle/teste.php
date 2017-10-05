<?php

require_once('AeroportoDAO.php');
require_once('AviaoDAO.php');
require_once('ClienteDAO.php');
require_once('VooDAO.php');

//$oi = ClienteDAO::getClienteByEmail("vinizorza@hotmail.com");
$oi = VooDAO::pegarVoos("2017-09-19", "Congonhas","Los Angeles");

//$oi = AeroportoDAO::pegarAeroportoPeloId(1);

//$cliente = new Cliente("Jose", "32238974", "jose@gmail.com", "32143289743");
//ClienteDAO::insereCliente($cliente);
print_r($oi);
