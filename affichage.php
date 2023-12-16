<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("config.php");    
try {
        $pdo = new PDO("mysql:host=$server;dbname=$db;", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM crud");
        $stmt->execute();

        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a> | <a href='edit.php?id=" . $row['id'] . "'>edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    ?>
</body>
</html>