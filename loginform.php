<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            
            $_SESSION['user_id'] = $row["id"];
            
            header("Location: rules.php");
            exit();
        } else {
            echo "Login failed";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
</head>
<body>
    <?php if($showLoginPage): ?>
    <div class="loginpage-container">
        <h2>Welcome</h2>
        <h4>Start a chat to talk to forum members. Remember the rules!</h4>
        <a href="rules.php">Look Rules!</a>
    </div>
    <?php endif; ?>
</body>
</html>
