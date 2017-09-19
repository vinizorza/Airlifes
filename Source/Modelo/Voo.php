<?php

abstract class Voo{

	private var $id;
	private var $codigo;
	private var $horarioPartida;
	private var $horarioChegada;
	private var $preco;
	private var $aeroportoOrigem;
	private var $aeroportoDestino;
	private var $aviao;
		
	function Voo($codigo, $nome, $horarioPartida, $horarioChegada, $preco, $aeroportoOrigem, $aeroportoDestino, $aviao){
        	$this->codigo = $codigo;
		$this->nome = $nome;
		$this->horarioPartida = $horarioPartida;
        	$this->horarioChegada = $horarioChegada;
		$this->preco = $preco;
		$this->aeroportoOrigem = $aeroportoOrigem;
		$this->aeroportoDestino = $aeroportoDestino;
        	$this->aviao = $aviao;
   	 }

	function getCodigo(){
        	return $this->codigo;
    	}
	
	function setCodigo($value){
        	$this->codigo = $value;
    	}
	
	function getHorarioPartida(){
        	return $this->horarioPartida;
    	}
	
	function setHorarioPartida($value){
        	$this->horarioPartida = $value;
    	}
	
	function getHorarioChegada(){
        	return $this->horarioChegada;
    	}
	
	function setHorarioChegada($value){
        	$this->horarioChegada = $value;
    	}
	
	function getPreco(){
        	return $this->preco;
    	}
	
	function setPreco($value){
        	$this->preco = $value;
    	}
	
	function getAeroportoOrigem(){
        	return $this->aeroportoOrigem;
    	}
	
	function setAeroportoOrigem($value){
        	$this->aeroportoOrigem = $value;
    	}
	
	function getAeroportoDestino(){
        	return $this->aroportoDestino;
    	}
	
	function setAeroportoDestino($value){
        	$this->aroportoDestino = $value;
    	}
	
	function getAviao(){
        	return $this->aviao;
    	}
	
	function setAviao($value){
        	$this->aviao = $value;
    	}
	
	function getId(){
        	return $this->id;
    	}
	
	function setId($value){
        	$this->id = $value;
    	}
	



}
