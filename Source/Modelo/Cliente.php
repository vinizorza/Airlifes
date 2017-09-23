<?php

class Cliente {
	
	protected $nome;
	protected $telefone;
	protected $email;
	protected $id;
        protected $cpf;
	
	function Cliente($nome, $telefone, $email, $cpf){
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->email = $email;
                $this->cpf = $cpf;
	}

	function getNome(){
		return $this->nome;
	}
	function getCpf() {
            return $this->cpf;
        }

        function setCpf($value) {
            $this->cpf = $value;
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
