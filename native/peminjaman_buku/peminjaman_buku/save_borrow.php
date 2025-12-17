<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    // Validasi input
    if (empty($nama) || empty($judul) || empty($tgl_pinjam) || empty($tgl_kembali)) {
        die("Semua field wajib diisi!");
    }

    // Query simpan data
    $sql = "INSERT INTO peminjaman (nama, judul, tgl_pinjam, tgl_kembali, status) 
            VALUES ('$nama', '$judul', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')";

    if ($conn->query($sql) === TRUE) {
        header("Location: history.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
