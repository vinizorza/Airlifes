<?php
Class DbConnection{
    public static function getdbconnect(){
        $conn = new PDO('mysql:host=localhost;dbname=airlifes;charset=utf8', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
//    public static function getdbconnect(){
//        $conn = new PDO('mysql:host=viniciuszorzanelli.com.mysql;dbname=viniciuszorzanelli_com;charset=utf8', 'viniciuszorzanelli_com', 'v8QcqyNx');
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $conn;
//    }
}