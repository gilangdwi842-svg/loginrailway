<?php
// koneksi.php

// GANTI teks di dalam tanda kutip dengan nilai dari tab 'Variables' di MySQL Railway Anda
$host     = "mysql.railway.internal";     // Diambil dari MYSQLHOST
$port     = "3306";     // Diambil dari MYSQLPORT (biasanya 3306)
$dbname   = "railway"; // Diambil dari MYSQLDATABASE
$username = "root";     // Diambil dari MYSQLUSER
$password = "iQnPTyIQBdIIMkxfHxtAcUdJjvmIpSPh"; // Diambil dari MYSQLPASSWORD

try {
    // Menghubungkan PDO menggunakan host, port, dan dbname dari Railway
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
