<?php

require_once('AviaoDAO.php');

    $ei = new AviaoDAO();
    $oi = $ei->listarTodosAvioes();

while($row = $oi->fetch()) {
    print_r($row);
}

