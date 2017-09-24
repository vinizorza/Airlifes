<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Aeroporto.php');

class AeroportoDAO{
    public static function pegarAeroportoPeloId($id){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aeroporto WHERE idAEROPORTO = ' . "'" .$id."'");
        $stmt->execute();
        
        $row = $stmt->fetch();
        
        $aeroporto = new Aeroporto($row[NOME], $row[CIDADE], $row[ESTADO], $row[PAIS], $row[SIGLA]);
        $aeroporto->setId($row[idAEROPORTO]); 
        
        return $aeroporto;
    }
}