<?php

class PassageiroDAO{
    public static function inserirPassageiro($cpf, $nome, $dataNascimento){
        
        $connection = DbConnection::getdbconnect();
        
        $query = "INSERT INTO passageiro (idPASSAGEIRO, CPF, NOME, DATA_NASCIMENTO, EMAIL, TELEFONE) VALUES (NULL,'".$cpf."','".$nome."', '".$dataNascimento."', NULL, NULL)";

        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        return $connection->lastInsertId();        
     
    }
}