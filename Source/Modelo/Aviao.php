<?php

abstract class Aviao{

    private $id;
    private $modelo;
    private $capacidade;
    private $fabricante;

    function Aviao($modelo, $capacidade, $fabricante){
        $this->modelo = $modelo;
        $this->capacidade = $capacidade;
        $this->fabricante = $fabricante;
    }

    function getModelo(){
        return $this->modelo;
    }

    function setModelo($value){
        $this->modelo = $value;
    }

    function getCapacidade(){
        return $this->capacidade;
    }

    function setCapacidade($value){
        $this->capacidade = $value;
    }

    function getFabricante(){
        return $this->fabricante;
    }

    function setFabricante($value){
        $this->fabricante = $value;
    }

    function getId(){
        return $this->id;
    }

    function setId($value){
        $this->id = $value;
    }
}
