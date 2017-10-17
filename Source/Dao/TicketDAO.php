<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Aeroporto.php');

class TicketDAO{
    public static function inserirTicket($idVoo, $nome, $dataNascimento){
        
        //VOO_idVOO	CODIGO_ASSENTO	DESCONTO	COMPRA_idCOMPRA	PASSAGEIRO_idPASSAGEIRO

        $connection = DbConnection::getdbconnect();
        
        $query = "INSERT INTO ticket (idTICKET, VOO_idVOO, CODIGO_ASSENTO, DESCONTO, COMPRA_idCOMPRA, PASSAGEIRO_idPASSAGEIRO) VALUES (NULL,".$idVoo.", '". $codigoAssento."','".$desconto."','".$idCompra."','".$idPassageiro."')";

        echo $query;
//        $stmt = $connection->prepare('SELECT * FROM aeroporto WHERE idAEROPORTO = ' . "'" .$id."'");
//        $stmt->execute();
        
     
    }
}