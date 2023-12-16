<?php
include("config.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("UPDATE crud SET name=:name, email=:email, phone=:phone WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    header("Location: crud.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
