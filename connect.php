<?php 
$serverName = "localhost";
$userName = "roott"; 
$password = "999325"; 
$dbName = "kayit_login"; 

$conn = new mysqli($serverName, $userName, $password, $dbName);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
