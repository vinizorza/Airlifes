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

        while($row = $stmt->fetch()) {
            print_r($row);
        }


        //return $stmt;
    }



}