<?php

require_once('Dbconnection.php');

class AviaoDAO{

    function _AviaoDAO(){

    }

    function listarTodosAvioes(){

        $con = new DbConnection();
        $connection = $con->getdbconnect();

        $stmt = $connection->prepare('SELECT * FROM aviao');
        $stmt->execute();

        return $stmt;
    }



//    $con = new DbConnection();
//    $teste = con.
    
//    public static function carregarAvioes()	{
//		$sql  = "SELECT * FROM aviao";
//		$qry = mysqli_query($con, $sql);
//		$avioes = [];
//		while ($row = mysqli_fetch_array($qry)) {
//			$avioes[] = $row;
//		}
//		return $avioes;
//    }
    

}