<?php
require_once('../Tools/DbConnection.php');
require_once('../Modelo/Cliente.php');

class ClienteDAO{

    public static function getClienteByEmail($email){
        
        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM cliente WHERE EMAIL = ' . "'" .$email."'");
        $stmt->execute();
        
        $row = $stmt->fetch();
        
        $cliente = new Cliente($row[NOME], $row[TELEFONE], $row[EMAIL], $row[CPF], $row[SENHA]);
        $cliente->setId($row[idCLIENTE]);        
        
        return $cliente;
    }
    
    public static function insereCliente($cliente){
        
        $connection = DbConnection::getdbconnect();
        
        $str = 'INSERT INTO cliente (NOME, CPF, TELEFONE, EMAIL) VALUES ('."'".$cliente->getNome() . "','"
                                                                          . $cliente->getCpf(). "','"
                                                                          . $cliente->getTelefone() . "','"
                                                                          . $cliente->getEmail(). "')";
        
//        echo $str;
        $stmt = $connection->prepare($str);
        $stmt->execute();

    }
    
    public static function getClienteByCpf($cpf){
        
        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM cliente WHERE CPF = ' . "'" .$cpf."'");
        $stmt->execute();
        
        $row = $stmt->fetch();
        
        $cliente = new Cliente($row[NOME], $row[TELEFONE], $row[EMAIL], $row[CPF]);
        $cliente->setId($row[idCLIENTE]);        
        
        return $cliente;
    }
}