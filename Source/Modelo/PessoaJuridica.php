<?php

include_once 'Cliente.php';

class PessoaJuridica extends Cliente{

	private var $cnpj;	

	function Cliente($nome, $telefone, $email, $cnpj){
		parent::Cliente($nome, $telefone, $email);
		$this->$cnpj = $cnpj;
	}
	
	function getCnpj(){
		return $this->cnpj;
	}

	function setCnpj($value){
		$this->cnpj = $value;
	}
}
