<?php
Class DbConnection{
    public static function getdbconnect(){
        $conn = new PDO('mysql:host=localhost;dbname=airlifes', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
//    public static function getdbconnect(){
//        $conn = new PDO('mysql:host=viniciuszorzanelli.com.mysql;dbname=viniciuszorzanelli_com', 'viniciuszorzanelli_com', 'v8QcqyNx');
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $conn;
//    }
}