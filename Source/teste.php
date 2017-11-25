<?php

require_once('../Dao/VooDAO.php');
require_once('../Dao/VooDAO.php');
//$oi = ClienteDAO::getClienteByEmail("vinizorza@hotmail.com");
//$oi = VooDAO::pegarVoos("2017-09-19", "Congonhas","Los Angeles");
$oi = VooDAO::pegarVooPorId(1);

//$oi = AeroportoDAO::pegarAeroportoPeloId(1);

//$cliente = new Cliente("Jose", "32238974", "jose@gmail.com", "32143289743");
//ClienteDAO::insereCliente($cliente);
print_r($oi);
