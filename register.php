<?php
// register.php
include "koneksi.php";

// Mengambil input dari Kodular
$username = isset($_GET['username']) ? trim($_GET['username']) : '';
$password = isset($_GET['password']) ? trim($_GET['password']) : '';

// Validasi jika input kosong
if (empty($username) || empty($password)) {
    echo "empty";
    exit;
}

try {
    // 1. Cek apakah username sudah pernah terdaftar atau belum
    $stmt_check = $conn->prepare("SELECT * FROM user WHERE username = :user");
    $stmt_check->execute(['user' => $username]);
    $user_exists = $stmt_check->fetch();

    if ($user_exists) {
        echo "exists"; // Kirim respon ke Kodular kalau username sudah dipakai
        exit;
    }

    // 2. Jika username belum terdaftar, masukkan data baru ke database
    $stmt_insert = $conn->prepare("INSERT INTO user (username, password) VALUES (:user, :pass)");
    $result = $stmt_insert->execute(['user' => $username, 'pass' => $password]);

    if ($result) {
        echo "success"; // Registrasi berhasil
    } else {
        echo "failed";  // Registrasi gagal karena masalah teknis
    }
    
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}
?>
