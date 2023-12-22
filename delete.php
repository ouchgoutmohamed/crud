<?php
include("config.php");

$id = $_GET['id'];

try {
    $pdo = getCon();
    $stmt = $pdo->prepare("DELETE FROM crud WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: crud.php"); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
