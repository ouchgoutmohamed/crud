<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion des taches</h1>

    <h2>ajouter une tache</h2>
    <form class="form" action="insert.php" method="post">
        <label for="">tache </label>
        <input type="text" name="tache" id="" required>
        <label for="">date </label>
        <input type="date" name="date" id="" required>
       
        <input type="submit" value="Insert">
    </form>

    <h2>Contacts</h2>
    
<?php
include("config.php");    
try {
    $pdo = getCon();
    $stmt = $pdo->prepare("SELECT * FROM crud");
    $stmt->execute();

    echo "<table>";
    echo "<tr><th>completed</th><th>id</th><th>tache</th><th>date</th><th>Status</th><th>Action</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        $status=$row['status'];
        $isChecked = $row['status'] == 'completed' ? 'checked' : '';
        if($row['date'] < date('Y-m-d') && $row['status'] == 'en cours'){
            $status='en retard ';
            $row['date'] = date('Y-m-d');
        }
        
        echo "<td><input id=" . $row['id'] . " type='checkbox' onclick='completetache(" . $row['id'] . ")' $isChecked></td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['tache'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $status . "</td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a> | <a href='edit.php?id=" . $row['id'] . "'>edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>

<script>
    function completetache(id) {
        var xhr = new XMLHttpRequest();
        var url = "updatestatus.php?id=" + id;

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        };

        xhr.open("GET", url, true);
        xhr.send();
    }
</script>

</body>
</html>
