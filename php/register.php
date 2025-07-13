<?php
require 'db.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($name && $email && $password) {
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashed]);
        echo "Đăng ký thành công!";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "Vui lòng nhập đầy đủ thông tin.";
}
?>
