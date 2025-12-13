<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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

        /* Search bar */
        .search-bar {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        .search-bar input {
            width: 60%;
            padding: 10px 15px;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            outline: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background: #e8ecfa;
            color: #333;
        }

        .search-bar input:focus {
            border: 2px solid #4e73df;
            background: #fff;
        }

        /* Grid layout untuk daftar buku */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        /* Card buku */
        .book-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            min-height: 50px;
        }

        .btn {
            display: inline-block;
            padding: 8px 15px;
            background: #1cc88a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
            font-size: 0.9rem;
        }

        .btn:hover {
            background: #17a673;
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
        <h1>Daftar Buku</h1>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="🔍 Cari judul buku...">
        </div>

        <!-- Grid Daftar Buku -->
        <div class="books-grid" id="booksGrid">
            <div class="book-card">
                <div class="book-title">The 7 Wings of Sinners</div>
                <a href="borrow.php?judul=The 7 Wings of Sinners" class="btn">Pinjam</a>
            </div>
            <div class="book-card">
                <div class="book-title">Anjana</div>
                <a href="borrow.php?judul=Anjana" class="btn">Pinjam</a>
            </div>
            <div class="book-card">
                <div class="book-title">One Piece</div>
                <a href="borrow.php?judul=One Piece" class="btn">Pinjam</a>
            </div>
            <div class="book-card">
                <div class="book-title">Historie l'Indonesie</div>
                <a href="borrow.php?judul=Historie l'Indonesie" class="btn">Pinjam</a>
            </div>
            <div class="book-card">
                <div class="book-title">The History of Java</div>
                <a href="borrow.php?judul=The History of Java" class="btn">Pinjam</a>
            </div>
            <div class="book-card">
                <div class="book-title">Detective Conan</div>
                <a href="borrow.php?judul=Detective Conan" class="btn">Pinjam</a>
            </div>
        </div>
    </div>

    <script>
        // Fitur search filter judul
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let books = document.querySelectorAll(".book-card");

            books.forEach(function(book) {
                let title = book.querySelector(".book-title").innerText.toLowerCase();
                book.style.display = title.includes(filter) ? "block" : "none";
            });
        });
    </script>
</body>
</html>
