<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Voo.php');
require_once('../Modelo/Aviao.php');
require_once('../Modelo/Aeroporto.php');

class CompraDAO{

    public static function inserirCompra($numeroCartao, $cpf){

        $connection = DbConnection::getdbconnect();
        
        $Cliente = ClienteDAO::getClienteByCpf($cpf);
        $query = 'INSERT INTO compra (idCOMPRA, HORARIO, NUMERO_CARTAO, CLIENTE_idCLIENTE, idHOSPEDAGEM) VALUES (NULL, NOW(),'."'".$numeroCartao."'".','.$Cliente->getId().',NULL)';
        
        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        return strval($connection->lastInsertId());
        
    }
    
    public static function inserirHospedagem($idHospedagem, $idCompra){

        $connection = DbConnection::getdbconnect();
        
        $Cliente = ClienteDAO::getClienteByCpf($cpf);
        $query = "UPDATE COMPRA SET idHOSPEDAGEM = " . $idHospedagem . " WHERE idCOMPRA = " . $idCompra;
        
        $stmt = $connection->prepare($query);
        $stmt->execute();
        
    }
    
        
    
    

}