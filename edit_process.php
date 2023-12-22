<?php
include("config.php");

$id = $_POST['id'];
$tache = $_POST['tache'];
$date = $_POST['date'];


try {
    $pdo = getCon();
    $stmt = $pdo->prepare("UPDATE crud SET tache= :tache, date =:date  WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tache', $tache);
    $stmt->bindParam(':date', $date);
    
    $stmt->execute();

    header("Location: crud.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
