<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website donasi untuk Masjid Jenderal Ahmad Yani">
    <meta name="author" content="Masjid Jenderal Ahmad Yani">
    <title>@yield('title', 'Masjid Jenderal Ahmad Yani')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1a6f5e;
            --secondary-green: #2c9f7f;
            --accent-gold: #ffd700;
            --text-color: #333333;
            --light-bg: #f8f9fa;
        }
        body {
            color: var(--text-color);
            font-family: 'Arial', sans-serif;
        }
        .bg-primary-green { background-color: var(--primary-green); }
        .bg-secondary-green { background-color: var(--secondary-green); }
        .text-primary-green { color: var(--primary-green); }
        .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .btn-success:hover {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
        }
        .navbar-custom .nav-link {
            color: white !important;
        }
        .navbar-custom .nav-link:hover {
            color: var(--accent-gold) !important;
        }
        .footer-custom {
            background-color: var(--primary-green);
            color: white;
        }
        .social-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: white;
        }
        .social-icon:hover {
            color: var(--accent-gold);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-masjid.png') }}" height="30" class="d-inline-block align-top me-2" alt="Logo">
                Masjid Jenderal Ahmad Yani
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active d-flex align-items-center" aria-current="page" href="{{ route('home_donatur') }}"><i class="bi bi-house-door me-2"></i>Beranda</a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('donasi.index') }}"><i class="bi bi-heart me-2"></i>Donasi</a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('zakat_jamaah.index') }}"><i class="bi bi-cash-coin me-2"></i>Zakat</a></li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ route('qurban_jamaah.index') }}"><i class="bi bi-cart me-2"></i>Qurban</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="riwayatDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-clock-history me-2"></i>Riwayat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="riwayatDropdown">
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('donasi.riwayat_users') }}"><i class="bi bi-heart me-2"></i>Riwayat Donasi</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('zakat_jamaah.riwayat_users') }}"><i class="bi bi-cash-coin me-2"></i>Riwayat Zakat</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('qurban_jamaah.riwayat_users') }}"><i class="bi bi-cart me-2"></i>Riwayat Qurban</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="akunDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>Akun
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="akunDropdown">
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-5 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3">Tentang Kami</h5>
                    <p>Masjid Jenderal Ahmad Yani adalah tempat ibadah dan pusat kegiatan Islam yang berkomitmen untuk melayani umat dan membangun masyarakat yang lebih baik.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3">Kontak</h5>
                    <p><i class="bi bi-geo-alt-fill me-2"></i>Jl. Contoh No. 123, Kota, Provinsi</p>
                    <p><i class="bi bi-envelope-fill me-2"></i>info@masjidjenderalahmadyani.com</p>
                    <p><i class="bi bi-telephone-fill me-2"></i>(021) 1234-5678</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3">Ikuti Kami</h5>
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <hr class="my-4">
            <p class="m-0 text-center">&copy; {{ date('Y') }} Masjid Jenderal Ahmad Yani</p>
        </div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function (){
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        });
    </script>
</body>
</html>