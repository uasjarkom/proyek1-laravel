<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Toko ATK</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
            padding-bottom: 60px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
        }

        p, a, li {
            font-weight: 400;
            line-height: 1.6;
        }

        .card-title {
            font-weight: 500;
        }

        .card {
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        footer {
            background-color: #003399;
        }

        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.2rem;
        }

        .social-icons a:hover {
            color: #ffc107;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: #003399;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #555;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar {
            background: linear-gradient(90deg, #003399, #0056d2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            font-weight: 500;
            color: white !important;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar-toggler {
            border-color: #ffc107;
        }

        .navbar-toggler-icon {
            background-color: #ffc107;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-shop me-2"></i>Berlin FC & ATK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="hero-title">Selamat Datang di <span style="color: #ffc107;">Berlin FC & ATK</span></h1>
            <p class="hero-subtitle">Sistem pencatatan modern untuk mengelola barang, laporan penjualan, user, dan transaksi dengan efisien.</p>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Utama</h2>
            <div class="row g-4 text-center">
                <!-- Kelola Barang -->
                <div class="col-md-3 d-flex">
                    <div class="card border-0 shadow flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-box-seam text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Kelola Barang</h5>
                            <p class="card-text">Tambah, edit, dan kelola stok barang dengan mudah dan cepat.</p>
                        </div>
                    </div>
                </div>
                <!-- Laporan Penjualan -->
                <div class="col-md-3 d-flex">
                    <div class="card border-0 shadow flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-bar-chart text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Laporan Penjualan</h5>
                            <p class="card-text">Pantau dan unduh laporan penjualan harian, mingguan, atau bulanan.</p>
                        </div>
                    </div>
                </div>
                <!-- Manajemen User -->
                <div class="col-md-3 d-flex">
                    <div class="card border-0 shadow flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-person-circle text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Kelola User</h5>
                            <p class="card-text">Atur user untuk membedakan hak akses antara admin dan karyawan.</p>
                        </div>
                    </div>
                </div>
                <!-- Transaksi Penjualan -->
                <div class="col-md-3 d-flex">
                    <div class="card border-0 shadow flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-receipt text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="card-title">Transaksi Penjualan</h5>
                            <p class="card-text">Melakukan transaksi oleh kasir dan menghasilkan output struk.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Kontak Kami</h2>
            <p class="mb-4">Untuk informasi lebih lanjut, Anda dapat menghubungi kami melalui:</p>
            <ul class="list-unstyled">
                <li>Email: <a href="mailto:berlianafc&atk.com" class="text-primary">berlianafc&atk.com</a></li>
                <li>Telepon: +62 812 3456 7890</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Berliana FC & ATK. Semua Hak Dilindungi.</p>
            <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
