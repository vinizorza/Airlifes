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
    
    public static function insereCliente($nome, $telefone, $email, $cpf, $senha){
        
        $connection = DbConnection::getdbconnect();
        
        $str = 'INSERT INTO cliente (NOME, CPF, TELEFONE, EMAIL, SENHA) VALUES ('."'".$nome. "','"
                                                                                    . $cpf. "','"
                                                                                    . $telefone . "','"
                                                                                    . $email . "','"
                                                                                    . $senha. "')";
        
        $clienteAux = ClienteDAO::getClienteByEmail($email);
        
        if($clienteAux->getEmail() != null){
            return "EMAIL_EXISTENTE";
        }
        
        $clienteAux = ClienteDAO::getClienteByCpf($cpf);
        
        if($clienteAux->getCpf() != null){
            return "CPF_EXISTENTE";
        }
        
        $stmt = $connection->prepare($str);;
        $stmt->execute();
        
        return "CLIENTE_INSERIDO";

    }
    
    public static function getClienteByCpf($cpf){
        
        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM cliente WHERE CPF = ' . "'" .$cpf."'");
        $stmt->execute();
        
        $row = $stmt->fetch();
        
        $cliente = new Cliente($row[NOME], $row[TELEFONE], $row[EMAIL], $row[CPF], $row[SENHA]);
        $cliente->setId($row[idCLIENTE]);        
        
        return $cliente;
    }
    
    public static function getCompras($idCliente){
        
        $connection = DbConnection::getdbconnect();
        
        $query = "SELECT * ".
                        "FROM COMPRA ".
                        "INNER JOIN TICKET ".
                    "INNER JOIN VOO ".
                    "INNER JOIN AEROPORTO AS ORIGEM ".
                    "INNER JOIN AEROPORTO AS DESTINO ".
                    "ON COMPRA_idCOMPRA = idCOMPRA ".
                        "AND VOO_idVOO = idVOO ".
                        "AND ORIGEM.idAEROPORTO = idAEROPORTO_ORIGEM ".
                        "AND DESTINO.idAEROPORTO = idAEROPORTO_DESTINO ".
                    "WHERE CLIENTE_idCLIENTE = ".$idCliente;
                
        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        $compras = array();
        $index = 0;
        
                        
        while ($row = $stmt->fetch()){
           
            $compras[$index]["HORARIO_COMPRA"]  = $row[HORARIO];
            $compras[$index]["ID_HOSPEDAGEM"]   = $row[idHOSPEDAGEM];
            $compras[$index]["CODIGO_VOO"]      = $row[CODIGO];
            $compras[$index]["HORARIO_PARTIDA"] = $row[HORARIO_PARTIDA];
            $compras[$index]["HORARIO_CHEGADA"] = $row[HORARIO_CHEGADA];
            $compras[$index]["PRECO"]           = $row[PRECO];
            $compras[$index]["CIDADE_ORIGEM"]   = $row[21];
            $compras[$index]["CIDADE_DESTINO"]  = $row[27];
            $index++;
        }
        
        return $compras;
    }
}