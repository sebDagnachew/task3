<?php
require 'db.php';
require 'vendor/autoload.php'; // Include Composer autoload

use Firebase\JWT\JWT;

$secret_key = "your_secret_key"; // Change this to a secure secret key
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->email) && !empty($data->password)) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$data->email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($data->password, $user['password'])) {
        $payload = [
            "id" => $user['id'],
            "email" => $user['email'],
            "role" => $user['role'],
            "exp" => time() + 3600 // Token expires in 1 hour
        ];

        $jwt = JWT::encode($payload, $secret_key, 'HS256');
        echo json_encode(["message" => "Login successful", "token" => $jwt]);
    } else {
        echo json_encode(["message" => "Invalid credentials"]);
    }
} else {
    echo json_encode(["message" => "Email and password required"]);
}
?>
