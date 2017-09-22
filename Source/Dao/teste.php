<?php

require_once('AviaoDAO.php');

    $oi = AviaoDAO::listarTodosAvioes();

while($row = $oi->fetch()) {
    print_r($row);
}

