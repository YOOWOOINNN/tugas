<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Update status menjadi 'Selesai'
    $sql = "UPDATE peminjaman SET status = 'Dikembalikan' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: borrow.php");
        exit();
    } else {
        echo "Gagal mengupdate status: " . $conn->error;
    }
} else {
    header("Location: borrow.php");
    exit();
}
?>
