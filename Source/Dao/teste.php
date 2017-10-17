<?php

require_once('../Dao/AeroportoDAO.php');
require_once('../Dao/AviaoDAO.php');
require_once('../Dao/ClienteDAO.php');
require_once('../Dao/VooDAO.php');
require_once('../Dao/CompraDAO.php');
require_once('../Dao/PassageiroDAO.php');

//$oi = ClienteDAO::getClienteByEmail("vinizorza@hotmail.com");
//$oi = VooDAO::pegarVoos("2017-09-19", "Congonhas","Los Angeles");
PassageiroDAO::inserirPassageiro(444, "Pedro", "2000-12-16");

//$oi = VooDAO::pegarVooPorId(3);

//$oi = AeroportoDAO::pegarAeroportoPeloId(1);

//$cliente = new Cliente("Jose", "32238974", "jose@gmail.com", "32143289743");
//ClienteDAO::insereCliente($cliente);
//print_r($oi);
