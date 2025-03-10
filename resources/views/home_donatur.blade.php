@extends('layouts.app_donatur')

@section('title', 'Selamat Datang di Masjid Jenderal Ahmad Yani')

@section('content')
    <!-- Pesan Selamat Datang yang Dipersonalisasi -->
    <header class="py-5" style="background: linear-gradient(135deg, #1a6f5e, #2c9f7f);">
        <div class="container px-4">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                        <div class="card-body p-5">
                            <h1 class="display-4 fw-bold text-black mb-3">Assalamu'alaikum, {{ Auth::user()->name }}!</h1>
                            <p class="lead mb-4 text-dark">Selamat datang kembali di portal donasi Masjid Jenderal Ahmad Yani. Kehadiran Anda sangat berarti dalam membangun rumah Allah.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-start">
                                <a class="btn btn-success btn-lg px-4 me-sm-3 rounded-pill" href="{{ route('donasi.index') }}">
                                    <i class="bi bi-heart-fill me-2"></i>Donasi Sekarang
                                </a>
                                <a class="btn btn-outline-success btn-lg px-4 rounded-pill" href="{{ route('donasi.riwayat_users') }}">
                                    <i class="bi bi-clock-history me-2"></i>Riwayat Donasi Anda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Kutipan Inspiratif -->
    <section class="py-5 bg-light">
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="card border-0 shadow-sm rounded-lg">
                        <div class="card-body p-5">
                            <i class="bi bi-quote text-black display-1 mb-3"></i>
                            <h2 class="mb-4 text-black fst-italic lh-base">"Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki, dan Allah Mahaluas, Maha Mengetahui."</h2>
                            <p class="lead mb-0 text-dark">- QS. Al-Baqarah: 261</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Donasi -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container px-4">
            <h2 class="text-center text-black mb-5">Pencapaian Bersama</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-people text-black display-4 mb-3"></i>
                            <h3 class="card-title h2 text-black">1,234</h3>
                            <p class="card-text text-muted">Donatur Aktif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-building text-black display-4 mb-3"></i>
                            <h3 class="card-title h2 text-black">10</h3>
                            <p class="card-text text-muted">Program Aktif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-gift text-black display-4 mb-3"></i>
                            <h3 class="card-title h2 text-black">5,678</h3>
                            <p class="card-text text-muted">Penerima Manfaat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
