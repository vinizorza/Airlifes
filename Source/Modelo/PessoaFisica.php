<?php

include_once 'Cliente.php'

class PessoaFisica extends Cliente{

	private var $cpf;	

	function Cliente($nome, $telefone, $email, $cpf){
		parent::Cliente($nome, $telefone, $email);
		$this->$cpf = $cpf;
    	}

	function getCpf(){
        	return $this->cpf;
    	}
	
	function setCpf($value){
        	$this->cpf = $value;
    	}
}
