<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Voo.php');
require_once('../Modelo/Aviao.php');
require_once('../Modelo/Aeroporto.php');

class VooDAO{

    public static function listarTodosVoos(){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM voo');
        $stmt->execute();
        
        $avioes = array();
        $index = 0;
        
        while ($row = $stmt->fetch()){
            $voos[$index] = new Voo($row[MODELO], $row[CAPACIDADE], $row[FABRICANTE]);
            $avioes[$index]->setId($row[idAVIAO]);
            $index++;
        }
        
        return $avioes;
    }

}