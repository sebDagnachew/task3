<?php
require 'auth.php';

if ($user_role !== 'admin') {
    echo json_encode(["message" => "Access denied"]);
    exit();
}

echo json_encode(["message" => "Welcome Admin"]);
?>
