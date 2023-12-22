<?php 

function getCon(){
    try {
        $server="localhost";
$db="crud";
$password= "";
$username= "root";
$pdo = new PDO("mysql:host=$server;dbname=$db;", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    }catch(PDOException $ex){


    }
}
?>