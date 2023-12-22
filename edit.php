<?php
include("config.php");

$id = $_GET['id'];

// Fetch the task data based on ID
try {
    $pdo = getCon();
    $stmt = $pdo->prepare("SELECT * FROM crud WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Contact</title>
</head>
<body>
    <h2>Edit Contact</h2>
    <form class="form" action="edit_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="">Tache</label>
        <input type="text" name="tache" value="<?php echo $row['tache']; ?>" required>
        <label for="">Email</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
       <input type="submit" value=" edit">
    </form>
</body>
</html>
