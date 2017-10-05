<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Aeroporto.php');

class TicketDAO{
    public static function inserirTicket($ticket){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aeroporto WHERE idAEROPORTO = ' . "'" .$id."'");
        $stmt->execute();
        
     
    }
}