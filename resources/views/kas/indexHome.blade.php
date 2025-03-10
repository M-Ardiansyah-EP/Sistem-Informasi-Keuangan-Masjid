@extends('layouts.app_home')

@section('title', 'Data Kas')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s" style="background: url('{{ asset('images/masjid-ahmadyani.jpg') }}') center center no-repeat; background-size: cover;">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Data Kas</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Data Kas</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Ringkasan Kas Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6 mb-4">Ringkasan Kas</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                    <div class="text-center p-4">
                        <h3 class="mb-3">Total Pemasukan</h3>
                        <span>{{ format_rupiah($totalpemasukan) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                    <div class="text-center p-4">
                        <h3 class="mb-3">Total Pengeluaran</h3>
                        <span>{{ format_rupiah($totalpengeluaran) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                    <div class="text-center p-4">
                        <h3 class="mb-3">Saldo Akhir</h3>
                        <span>{{ format_rupiah($saldo_akhir_total) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ringkasan Kas End -->

<!-- Daftar Transaksi Kas Start -->
<div class="container-xxl py-6 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h2 class="display-6 mb-4">Laporan keuangan bulan {{ date('F Y') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th class="text-end">Pemasukan</th>
                                <th class="text-end">Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kas as $transaksi)
                            <tr>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ ucfirst($transaksi->kategori) }}</td>
                                <td>{{ ucfirst($transaksi->jenis) }}</td>
                                <td>{{ $transaksi->keterangan }}</td>
                                <td class="text-end">{{ $transaksi->kategori == 'pemasukan' ? format_rupiah($transaksi->jumlah) : '-' }}</td>
                                <td class="text-end">{{ $transaksi->kategori == 'pengeluaran' ? format_rupiah($transaksi->jumlah) : '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $kas->links('pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Daftar Transaksi Kas End -->
@endsection
