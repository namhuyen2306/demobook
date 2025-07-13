<?php
require 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Đăng nhập thành công. Xin chào, " . $user['name'];
    } else {
        echo "Email hoặc mật khẩu không đúng.";
    }
} else {
    echo "Vui lòng nhập email và mật khẩu.";
}
?>
