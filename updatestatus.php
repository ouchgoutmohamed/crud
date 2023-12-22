<?php
include("config.php");
$pdo = getCon();

$id = $_GET['id'];


$sql = "UPDATE crud SET status = 'completed' WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);


$pdo = null;
?>
