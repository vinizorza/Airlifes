<?php

public class AviaoDAO{
    
    public AviaoDAO(){

    }

    public function carregarAvioes()	{
		$sql  = "SELECT * FROM aviao";		
		$qry = mysqli_query($con, $sql);
		$avioes = [];
		while ($row = mysqli_fetch_array($qry)) {
			$avioes[] = $row;
		}
		return $avioes;
    }
    
    public function carregarAviaoPeloId($id)	{
		$sql  = "SELECT * FROM aviao WHERE nome like '%$nome%'";
	
		$qry = mysqli_query($this->con, $sql);
		$produtos = [];
		while ($row = mysqli_fetch_array($qry)) {
			$produtos[] = $row;
		}
		return $produtos;
	}


    public function carregarAviaoPeloId($id)	{
		$sql  = "SELECT * FROM aviao";
		if ($nome) {
			$sql .= " WHERE nome like '%$nome%'";
		}
		$qry = mysqli_query($this->con, $sql);
		$produtos = [];
		while ($row = mysqli_fetch_array($qry)) {
			$produtos[] = $row;
		}
		return $produtos;
	}
}