<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif, sans-serif;
            background: #f8f9fc;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #4e73df;
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.2rem;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #2e59d9;
        }

        /* Main content */
        .main-content {
            margin-left: 220px;
            padding: 20px;
            flex: 1;
        }

        h1 {
            margin-bottom: 20px;
            color: #4e73df;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #4e73df;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        /* Status label */
        .status-dipinjam {
            background: #f6c23e;
            color: #fff;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .status-selesai {
            background: #1cc88a;
            color: #fff;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Perpustakaan</h2>
        <a href="index.php">Home</a>
        <a href="books.php">Daftar Buku</a>
        <a href="borrowed.php">Buku Dipinjam</a>
        <a href="history.php">Riwayat</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Riwayat Peminjaman</h1>

        <div class="table-container">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM peminjaman ORDER BY id DESC");
                if ($result->num_rows > 0):
                    $no = 1;
                    while ($row = $result->fetch_assoc()):
                        $statusClass = ($row['status'] == 'Dipinjam') ? 'status-dipinjam' : 'status-selesai';
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['judul']); ?></td>
                    <td><?= htmlspecialchars($row['tgl_pinjam']); ?></td>
                    <td><?= htmlspecialchars($row['tgl_kembali']); ?></td>
                    <td><span class="<?= $statusClass; ?>"><?= htmlspecialchars($row['status']); ?></span></td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="6">Belum ada riwayat peminjaman</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>

