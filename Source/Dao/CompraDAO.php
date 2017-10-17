<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Voo.php');
require_once('../Modelo/Aviao.php');
require_once('../Modelo/Aeroporto.php');

class CompraDAO{

    public static function inserirCompra($numeroCartao, $idCliente){

        $connection = DbConnection::getdbconnect();
        $query = 'INSERT INTO compra (idCOMPRA, HORARIO, NUMERO_CARTAO, CLIENTE_idCLIENTE, idHOSPEDAGEM) VALUES (NULL, NOW(),'."'".$numeroCartao."'".','.$idCliente.',NULL)';

        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        
    }
    
        
    
    

}