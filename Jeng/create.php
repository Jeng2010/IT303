<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $appearance = $_POST['appearance'];  
    $personality = $_POST['personality'];

    
    $stmt = $conn->prepare("INSERT INTO cat_tbl (name, breed, appearance, personality) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $breed, $appearance, $personality);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
