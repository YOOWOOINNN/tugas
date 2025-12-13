<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kamus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .top-bar {
        background: #003e9b;
        padding: 15px 0;
        color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .search-section {
        background: #0054d1;
        padding: 20px 0;
    }
    .word-card {
        border-left: 6px solid #0054d1;
        border-radius: 12px;
    }
</style>
</head>

<body class="bg-light">

<!-- TOP HEADER -->
<div class="top-bar">
    <div class="container d-flex justify-content-between align-items-center">

        <h3 class="fw-bold mb-0">Kamus Belajar</h3>

        <div class="d-none d-md-flex gap-4">
            <a class="text-white text-decoration-none" href="#">Dictionaries</a>
            <a class="text-white text-decoration-none" href="#">Grammar</a>
            <a class="text-white text-decoration-none" href="#">Word Lists</a>
            <a class="text-white text-decoration-none" href="#">Resources</a>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary btn-sm">Help</button>
            <button class="btn btn-warning btn-sm fw-bold">Sign In</button>
        </div>

    </div>
</div>

<!-- SEARCH BAR SECTION -->
<div class="search-section">
    <div class="container">

        <form class="row g-3" method="get" action="/">
            <div class="col-md-3">
                <select name="lang" class="form-select">
                    <option value="">Pilih bahasa</option>
                    @foreach($languages as $l)
                    <option value="{{ $l->id }}" @if(request('lang') == $l->id) selected @endif>
                        {{ $l->name }} ({{ $l->code }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-7">
                <input type="text" name="q" class="form-control"
                    placeholder="Search Dictionary..." value="{{ request('q') }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-warning fw-bold w-100">🔍 Search</button>
            </div>
        </form>

    </div>
</div>



<!-- RESULT SECTION -->
<div class="container mt-5">

    @if($result)
    <div class="card word-card shadow-sm">

        <div class="card-body">

            <!-- Tanggal kecil di atas -->
            <p class="text-muted small mb-1">{{ now()->format('d F Y') }}</p>

            <!-- Kata -->
            <h3 class="fw-bold text-primary">{{ $result->word }}</h3>

            <p class="text-muted fst-italic">noun</p>

            <!-- Audio icons dummy -->
            <div class="my-2 fs-4 text-primary">
                <span class="me-3" style="cursor:pointer;">🔊</span>
                <span style="cursor:pointer;">🔉</span>
            </div>

            <hr>

            <p><strong>Terjemahan:</strong> {{ $result->translation }}</p>

            @if($result->example)
            <p class="text-muted"><em>Contoh:</em> {{ $result->example }}</p>
            @endif

            <!-- Tambah ke daftar -->
            <form method="post" action="/add/{{ $result->id }}">
                @csrf
                <button class="btn btn-success mt-3 w-100">
                    + Masukkan ke Daftar
                </button>
            </form>

        </div>
    </div>

    <!-- Jika tidak ditemukan -->
    @elseif(request()->has('q'))
    <div class="alert alert-warning mt-4">Kata tidak ditemukan.</div>
    @endif

</div>


</body>
</html>
