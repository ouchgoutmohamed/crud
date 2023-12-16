<?php
include("config.php");

$id = $_GET['id'];

// Fetch the task data based on ID
try {
    $pdo = new PDO("mysql:host=$server;dbname=$db;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        <label for="">Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <label for="">Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="">Phone</label>
        <input type="number" name="phone" value="<?php echo $row['phone']; ?>" required>
        <input type="submit" value="Edit">
    </form>
</body>
</html>
