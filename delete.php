<?php
include("config.php");

$id = $_GET['id'];

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM crud WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: crud.php"); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
