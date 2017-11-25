<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Ticket.php');

class TicketDAO{
    public static function inserirTicket($idVoo, $numeroAssento, $desconto, $idCompra, $nomePassageiro, $cpf, $dataNascimento){
        
        $connection = DbConnection::getdbconnect();
        
        $idPassageiro = PassageiroDAO::inserirPassageiro($cpf, $nomePassageiro, $dataNascimento);
        
        $query = "INSERT INTO ticket (idTICKET, VOO_idVOO, CODIGO_ASSENTO, DESCONTO, COMPRA_idCOMPRA, PASSAGEIRO_idPASSAGEIRO) VALUES (NULL,".$idVoo.", '". $numeroAssento."','".$desconto."','".$idCompra."','".$idPassageiro."')";

        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        return $connection->lastInsertId(); 
        
    }
}