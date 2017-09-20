<?php
Class DbConnection{
    function getdbconnect(){
        $conn = new PDO('mysql:host=localhost;dbname=airlifes', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}