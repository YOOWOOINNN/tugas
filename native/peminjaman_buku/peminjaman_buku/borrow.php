<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tgl_pinjam = mysqli_real_escape_string($conn, $_POST['tgl_pinjam']);
    $tgl_kembali = mysqli_real_escape_string($conn, $_POST['tgl_kembali']);

    // Validasi input
    if (!empty($nama) && !empty($judul) && !empty($tgl_pinjam) && !empty($tgl_kembali)) {
        $sql = "INSERT INTO peminjaman (nama, judul, tgl_pinjam, tgl_kembali, status) 
                VALUES ('$nama', '$judul', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Peminjaman berhasil disimpan'); window.location='borrowed.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi!');</script>";
    }
}

// Ambil judul buku dari link
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1>Form Peminjaman Buku</h1>
        </div>

        <div class="table-container">
            <form method="POST">
                <div>
                    <label>Nama Peminjam</label><br>
                    <input type="text" name="nama" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div><br>

                <div>
                    <label>Judul Buku</label><br>
                    <input type="text" name="judul" value="<?= htmlspecialchars($judul); ?>" readonly style="width: 100%; padding: 8px; margin-top: 5px;">
                </div><br>

                <div>
                    <label>Tanggal Pinjam</label><br>
                    <input type="date" name="tgl_pinjam" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div><br>

                <div>
                    <label>Tanggal Kembali</label><br>
                    <input type="date" name="tgl_kembali" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div><br>

                <button type="submit" name="submit" class="btn">Pinjam</button>
                <a href="books.php" class="btn btn-danger" style="margin-left: 10px;">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
