<?php

abstract class Aeroporto {

	private var $id;
	private var $nome;
	private var $cidade;
	private var $estado;
	private var $pais;
	private var $sigla;
	
	function Aeroporto($nome, $cidade, $estado, $pais, $sigla){
		$this->nome = $nome;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->pais = $pais;
		$this->sigla = $sigla;
    }

	function getNome(){
		return $this->nome;
	}
	
	function setNome($value){
		$this->nome = $value;
	}

	function getCidade(){
		return $this->cidade;
	}
	
	function setCidade($value){
		$this->cidade = $value;
	}
	
	function getEstado(){
		return $this->estado;
	}
	
	function setEstado($value){
		$this->estado = $value;
	}
	
	function getPais(){
		return $this->pais;
	}
	
	function setPais($value){
		$this->pais = $value;
	}
	
	function getSigla(){
		return $this->sigla;
	}
	
	function setSigla($value){
		$this->sigla = $value;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setId($value){
        	$this->id = $value;
   	}


}
