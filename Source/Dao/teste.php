<?php

require_once('../Dao/AeroportoDAO.php');
require_once('../Dao/AviaoDAO.php');
require_once('../Dao/ClienteDAO.php');
require_once('../Dao/VooDAO.php');
require_once('../Dao/CompraDAO.php');
require_once('../Dao/PassageiroDAO.php');
require_once('../Dao/TicketDAO.php');

$oi = ClienteDAO::getClienteByEmail("vinizorza@hotmail.com");
//$oi = VooDAO::pegarVoos("2017-09-13", "VIX","CGH");
//PassageiroDAO::inserirPassageiro(4747, "Josi", "2000-02-16");
//$oi = CompraDAO::inserirCompra("3232", "32132132132");
//TicketDAO::inserirTicket("2", "65", 0, "3", "TesteUI", "448", "2000-02-16");
//$Cliente = ClienteDAO::getClienteByCpf("12312312312");
//print_r($Cliente->getId());

//$oi = VooDAO::pegarVooPorId(3);

//$oi = AeroportoDAO::pegarAeroportoPeloId(1);

//$cliente = new Cliente("Jose", "32238974", "jose@gmail.com", "32143289743");
//ClienteDAO::insereCliente($cliente);
//print_r($oi);

//$oi = VooDAO::pegarTodosVoos();
print_r($oi);
