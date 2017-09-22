<?php

abstract class Cliente {
	
	protected $nome;
	protected $telefone;
	protected $email;
	protected $id;
	
	function Cliente($nome, $telefone, $email){
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->email = $email;
	}

	function getNome(){
		return $this->nome;
	}
	
	function setNome($value){
		$this->nome = $value;
	}

	function getTelefone(){
		return $this->telefone;
	}
	
	function setTelefone($value){
		$this->telefone = $value;
	}
	
	function getEmail(){
		return $this->email;
	}
	
	function setEmail($value){
		$this->email = $value;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setId($value){
		$this->id = $value;
	}

    function buscarCompras(){

    }

    function realizarCompra($ticket, $passageiro){

    }

// Esta função ficará no controle, pois o cliente nao precisará estar logado para buscar
//    function buscarVoos($origem, $destino, $dataIda, $dataVolta){
//
//    }

}
