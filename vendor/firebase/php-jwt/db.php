<?php
$host = "localhost"; // Keep as "localhost"
$port = "4306";
$db_name = "jwt";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host; port=$port; dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
