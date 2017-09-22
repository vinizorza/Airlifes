<?php

class Passageiro{

    private $id;
	private $cpf;
	private $nome;
	private $dataNascimento;
	private $telefone;
	private $email;
	

    function Passageiro($cpf, $nome, $dataNascimento,$telefone, $email){
        $this->cpf = $cpf;
		$this->nome = $nome;
		$this->dataNascimento = $dataNascimento;
        $this->telefone = $telefone;
		$this->email = $email;
    }

	function getCpf(){
        return $this->cpf;
    }
	
	function setCpf($value){
        $this->cpf = $value;
    }
	
    function getNome(){
        return $this->nome;
    }
	
	function setNome($value){
        $this->nome = $value;
    }
	
	function getDataNascimento(){
        return $this->dataNascimento;
    }
	
	function setDataNascimento($value){
        $this->dataNascimento = $value;
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


}