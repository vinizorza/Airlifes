<?php

class Compra{
	private $id;
	private $horario;
	private $numeroCartao;
	private $idHospedagem;
	private $tickets = array();
		
	function Compra($horario, $numeroCartao, $idHospedagem, $tickets){
		$this->horario = $horario;
		$this->numeroCartao = $numeroCartao;
		$this->idHospedagem = $idHospedagem;
		$this->tickets = $tickets;
	}
  
	function getHorario(){
		return $this->horario;
	}
		
	function setHorario($value){
		$this->horario = $value;
	}
		
	function getNumeroCartao(){
		return $this->numeroCartao;
	}
		
	function setNumeroCartao($value){
		$this->numeroCartao = $value;
	}
		
	function getIdHospedagem(){
		return $this->idHospedagem;
	}

	function setIdHospedagem($value){
		$this->idHospedagem = $value;
	}

	function getTickets(){
		return $this->tickets;
	}

	function setTickets($value){
		$this->tickets = $value;
	}

	function getId(){
		return $this->id;
	}

	function setId($value){
		$this->id = $value;
	}
	
}
