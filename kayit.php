<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["password_2"];
    $age = $_POST["age"];

    
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email is already registered.";
    } else {
        if ($password === $confirmPassword) {
            if ($age >= 18) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $email, $hashedPassword);
                $stmt->execute();
                echo "You are now registered! To access the member page, log out and log in again.";
                echo '<a href="giris.html">Log Out</a>';
            } else {
                echo "You must be 18 or older to register.";
            }
        } else {
            echo "Passwords do not match.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
