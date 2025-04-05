<?php
require 'db.php';
require 'auth.php'; // Include JWT middleware

$stmt = $conn->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(["profile" => $user]);
?>
