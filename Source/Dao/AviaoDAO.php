<?php

require_once('../Tools/DbConnection.php');

class AviaoDAO{

    public static function listarTodosAvioes(){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aviao');
        $stmt->execute();

        return $stmt;
    }



}