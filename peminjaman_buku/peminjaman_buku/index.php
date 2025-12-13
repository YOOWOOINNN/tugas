<?php
include "koneksi.php";

// Ambil data statistik dari database
$total_buku = $conn->query("SELECT COUNT(DISTINCT judul) AS total FROM peminjaman")->fetch_assoc()['total'];
$total_dipinjam = $conn->query("SELECT COUNT(*) AS total FROM peminjaman WHERE status='Dipinjam'")->fetch_assoc()['total'];
$total_Dikembalikan = $conn->query("SELECT COUNT(*) AS total FROM peminjaman WHERE status='Selesai'")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Perpustakaan</h2>
        <a href="index.php" class="active">Home</a>
        <a href="books.php">Daftar Buku</a>
        <a href="borrow.php">Buku Dipinjam</a>
        <a href="history.php">Riwayat</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Home</h1>
        </div>

        <!-- Statistik Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Buku</h3>
                <p><?= $total_buku; ?></p>
            </div>
            <div class="card">
                <h3>Buku Dipinjam</h3>
                <p><?= $total_dipinjam; ?></p>
            </div>
            <div class="card">
                <h3>Buku Dikembalikan</h3>
                <p><?= $total_Dikembalikan; ?></p>
            </div>
        </div>

        <!-- Ringkasan Buku Terbaru -->
        <div class="table-container">
            <h2>Peminjaman Terbaru</h2>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Status</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM peminjaman ORDER BY id DESC LIMIT 5");
                if ($result->num_rows > 0):
                    $no = 1;
                    while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['judul']); ?></td>
                    <td><?= htmlspecialchars($row['tgl_pinjam']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="5">Belum ada peminjaman buku</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>

        <!-- Footer -->
    </div>
</body>
</html>
