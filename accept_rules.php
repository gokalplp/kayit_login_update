<?php
session_start();
include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_SESSION['user_id'])) {
        die("You need to log in first.");
    }

    $userId = $_SESSION['user_id']; 

    
    $sql = "UPDATE users SET rulesAccepted = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    
    if ($stmt->execute()) {
        header("Location: forum.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
