<?php

require_once('../Tools/DbConnection.php');
require_once('../Modelo/Voo.php');
require_once('../Modelo/Aviao.php');
require_once('../Modelo/Aeroporto.php');
require_once('AviaoDAO.php');
require_once('AeroportoDAO.php');

class VooDAO{

    public static function pegarTodosVoos(){

        $connection = DbConnection::getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM voo');
        $stmt->execute();
        
        $voos = array();
        $index = 0;
                        
        while ($row = $stmt->fetch()){
            //Pegar aviao
            $aviao = AviaoDAO::pegarAviaoPeloId($row[AVIAO_idAVIAO]);
            
            //Pegar Aeroporto origem e destino
            $aeroportoOrigem = AeroportoDAO::pegarAeroportoPeloId($row[idAEROPORTO_ORIGEM]);
            $aeroportoDestino = AeroportoDAO::pegarAeroportoPeloId($row[idAEROPORTO_DESTINO]);
            
            $voos[$index] = new Voo($row[CODIGO], $row[HORARIO_PARTIDA], $row[HORARIO_CHEGADA], $row[PRECO], $aeroportoOrigem, $aeroportoDestino, $aviao);
            $voos[$index]->setId($row[idVOO]);
            $index++;
        }
        //return $stmt;
        return $voos;
    }
    
        public static function pegarVoos($data, $origem, $destino){

        $connection = DbConnection::getdbconnect();
        
        $str = 'SELECT * FROM voo 
                    INNER JOIN aeroporto AS origem
                     INNER JOIN aeroporto AS destino
                     INNER JOIN aviao
                     ON idAEROPORTO_ORIGEM = origem.idAEROPORTO 
                         AND idAEROPORTO_DESTINO = destino.idAEROPORTO 
                         AND idAVIAO = AVIAO_idAVIAO
                     WHERE HORARIO_PARTIDA LIKE '."'%".$data."%'".
                         'AND (origem.NOME LIKE '."'%".$origem."%'".' OR origem.CIDADE LIKE '."'%".$origem."%')".
                         'AND (destino.NOME LIKE '."'%".$destino."%'".' OR destino.CIDADE LIKE '."'%".$destino."%')".
                         'AND CAPACIDADE > 0;';
        

        $stmt = $connection->prepare($str);
        $stmt->execute();
          
        $avioes = array();
        $index = 0;
                        
        while ($row = $stmt->fetch()){
            //Pegar aviao
            $aviao = new Aviao($row[MODELO], $row[CAPACIDADE], $row[FABRICANTE]);
            $aviao->setId($row[idAVIAO]);
            
            //Pegar Aeroporto origem e destino
            $aeroportoOrigem = new Aeroporto($row[9], $row[10], $row[11], $row[12], $row[13]);
            $aeroportoOrigem->setId($row[8]);
            $aeroportoDestino = new Aeroporto($row[NOME], $row[CIDADE], $row[ESTADO], $row[PAIS], $row[SIGLA]);
            $aeroportoDestino->setId($row[idAEROPORTO]);
            
            $voos[$index] = new Voo($row[CODIGO], $row[HORARIO_PARTIDA], $row[HORARIO_CHEGADA], $row[PRECO], $aeroportoOrigem, $aeroportoDestino, $aviao);
            $voos[$index]->setId($row[idVOO]);
            $index++;
        }
        
        return $voos;
    }
    
    
    public static function pegarVooPorId($id){

        $connection = DbConnection::getdbconnect();
        
        $query = 'select * from voo where idVOO = '.$id;
        $stmt = $connection->prepare($query);
        
        $stmt->execute();
        
        $row = $stmt->fetch();
        //Pegar aviao
        $aviao = AviaoDAO::pegarAviaoPeloId($row[AVIAO_idAVIAO]);

        //Pegar Aeroporto origem e destino
        $aeroportoOrigem = AeroportoDAO::pegarAeroportoPeloId($row[idAEROPORTO_ORIGEM]);
        $aeroportoDestino = AeroportoDAO::pegarAeroportoPeloId($row[idAEROPORTO_DESTINO]);

        $voos = array();
        
        $voos[0]= new Voo($row[CODIGO], $row[HORARIO_PARTIDA], $row[HORARIO_CHEGADA], $row[PRECO], $aeroportoOrigem, $aeroportoDestino, $aviao);
        $voos[0]->setId($row[idVOO]);
            
        
        //return $stmt;
        return $voos;
    }
    

    
    
    

}