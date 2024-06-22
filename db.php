<?php
$servername = "localhost";
$username = "root";  // ganti dengan username database Anda
$password = "";      // ganti dengan password database Anda
$dbname = "joki_tugas";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>