<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Aviao.php');

class AviaoDAO{

    public static function listarTodosAvioes(){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aviao');
        $stmt->execute();
        
        $avioes = array();
        $index = 0;
        
        while ($row = $stmt->fetch()){
            $avioes[$index] = new Aviao($row[MODELO], $row[CAPACIDADE], $row[FABRICANTE]);
            $avioes[$index]->setId($row[idAVIAO]);
            $index++;
        }
        
        return $avioes;
    }
    
    public static function pegarAviaoPeloId($id){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aviao WHERE idAVIAO = ' . "'" .$id."'");
        $stmt->execute();
        
        $row = $stmt->fetch();
        
        $aviao = new Aviao($row[MODELO], $row[CAPACIDADE], $row[FABRICANTE]);
        $aviao->setId($row[idAVIAO]); 
        
        return $aviao;
    }
    
    

}