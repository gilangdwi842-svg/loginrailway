<?php
// login.php
include "koneksi.php";

// Mengambil input dari Kodular dengan aman menggunakan metode GET
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

try {
    // Menggunakan Prepared Statement (Format PDO) agar aman dari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :user AND password = :pass");
    $stmt->execute(['user' => $username, 'pass' => $password]);
    
    $user_exists = $stmt->fetch();

    if ($user_exists) {
        echo "success"; // Ini yang dibaca Kodular jika berhasil login
    } else {
        echo "failed";  // Ini yang dibaca Kodular jika gagal login
    }
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}
?>
