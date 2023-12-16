<?php
include("config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

try{
    $pdo = new PDO("mysql:host=$server;dbname=$db;",$username,$password);
    $pdo->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO crud (name, email, phone) VALUES (:name, :email, :phone)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
     $stmt->execute();

     header("Location: affichage.php"); 
}catch(PDOexception $e){
    echo "". $e->getMessage();
}
$pdo = null;
?>