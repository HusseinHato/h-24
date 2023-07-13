<?php

$host = "localhost"; // Ganti dengan host database Anda
$dbname = "vokasiua_apotek"; // Ganti dengan nama database Anda
$username = "vokasiua_root"; // Ganti dengan nama pengguna database Anda
$password = "bukan14112002"; // Ganti dengan kata sandi database Anda

$conn = mysqli_connect($host, $username, $password, $dbname);
if ($conn) {
    echo "Koneksi database berhasil";
} else {
    echo "Koneksi database gagal";
}
