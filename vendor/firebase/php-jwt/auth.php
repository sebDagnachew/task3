<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";
$headers = apache_request_headers();

if (!isset($headers['Authorization'])) {
    echo json_encode(["message" => "Access denied"]);
    exit();
}

$token = str_replace("Bearer ", "", $headers['Authorization']);

try {
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
    $user_id = $decoded->id;
    $user_role = $decoded->role;
} catch (Exception $e) {
    echo json_encode(["message" => "Invalid token"]);
    exit();
}
?>
