<?php
include "koneksi.php";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST["nama"];
    $noTelp = $_POST["no_telp"];
    $alamat = $_POST["alamat"];
    $pegawaiId = $_POST["pegawai_id"];

    // Query untuk menambahkan data pelanggan ke database
    $query = "INSERT INTO customer (nama, no_telp, alamat, pegawai_id) VALUES ('$nama', '$noTelp', '$alamat', '$pegawaiId')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        $status = "Data pelanggan berhasil ditambahkan.";
    } else {
        $status = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Tambah Data Pelanggan</h1>

        <?php if (!empty($status)) : ?>
            <div class="alert alert-info mt-3">
                <?php echo $status; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="pegawai_id" class="form-label">Pegawai ID</label>
                <select class="form-select" id="pegawai_id" name="pegawai_id" required>
                    <?php
                    // Query untuk mengambil data pegawai
                    $queryPegawai = "SELECT id, nama FROM pegawai";
                    $resultPegawai = mysqli_query($conn, $queryPegawai);

                    // Membuat pilihan pegawai
                    while ($rowPegawai = mysqli_fetch_assoc($resultPegawai)) {
                        echo "<option value='" . $rowPegawai['id'] . "'>" . $rowPegawai['nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@
