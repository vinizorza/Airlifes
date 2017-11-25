<?php

class Voo{

	private $id;
	private $codigo;
	private $horarioPartida;
	private $horarioChegada;
	private $preco;
	private $aeroportoOrigem;
	private $aeroportoDestino;
	private $aviao;
		
	function Voo($codigo, $horarioPartida, $horarioChegada, $preco, $aeroportoOrigem, $aeroportoDestino, $aviao){
		$this->codigo = $codigo;
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
		return $this->aeroportoDestino;
	}
	
	function setAeroportoDestino($value){
		$this->aeroportoDestino = $value;
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
