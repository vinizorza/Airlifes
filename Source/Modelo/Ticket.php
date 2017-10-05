<?php

class Ticket{

    private $id;
    private $desconto;
    private $passageiro;
    private $voo;
    
    function Ticket($codigoAssento, $desconto, $passageiro, $voo){    
        $this->desconto = $desconto;
        $this->passageiro = $passageiro;
        $this->voo = $voo;
    }

    function getCodigoAssento(){
        return $this->codigoAssento;
    }
    
    function setCodigoAssento($value){
        $this->codigoAssento = $value;
    }

    function getDesconto(){
    	return $this->desconto;
    }
    
    function setDesconto($value){
        $this->desconto = $value;
    }
    
    function getPassageiro(){
        return $this->passageiro;
    }
    
    function setPassageiro($value){
        $this->passageiro = $value;
    }

    function getVoo(){
        return $this->voo;
    }
    
    function setVoo($value){
        $this->voo = $value;
    }
    
    function getId(){
        return $this->id;
    }
    
    function setId($value){
        $this->id = $value;
    }
}
