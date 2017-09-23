<?php

require_once('AviaoDAO.php');
require_once('ClienteDAO.php');

$oi = ClienteDAO::getClienteByEmail("vinizorza@hotmail.com");

print_r($oi);
