<?php

require_once('../Modelo/Cliente.php');

//Recebendo os valores
$email = $_POST['email'];
$senha = $_POST['senha'];

$cliente = new Cliente("a", "a", "a", "a");
echo $cliente->getCpf();

//echo $email;