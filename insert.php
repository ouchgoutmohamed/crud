<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $tache = isset($_POST['tache']) ? $_POST['tache'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    try {
        $pdo = getCon();
        $status='en cours';
        
        $stmt = $pdo->prepare("INSERT INTO crud (tache, date, status) VALUES (:tache, :date, :status)");

        
        $stmt->bindParam(':tache', $tache);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        header("Location: crud.php");
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }

    $pdo = null;
}
?>
