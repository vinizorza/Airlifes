<?php

//require_once('../Modelo/Cliente.php');
//require_once('../Modelo/PessoaFisica.php');
//
//$vinicius = new PessoaFisica("Vinicius", "333333", "vi@vi.com");
//echo $vinicius->getNome();

require_once('../Dao/VooDAO.php');
VooDAO::listarTodosVoos();