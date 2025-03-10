@extends('layouts.app_adminkit')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Kas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Kas</li>
        </ol>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row mb-4 align-items-center">
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Pemasukan</h5>
                        <p class="card-text">{{ format_rupiah($totalpemasukan) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengeluaran</h5>
                        <p class="card-text">{{ format_rupiah($totalpengeluaran) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Akhir</h5>
                        <p class="card-text">{{ format_rupiah($saldo_akhir_total) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Kas
            </div>          
            <div class="card-body">
                <h3>Riwayat Kas</h3>
                
                @if(auth()->user()->role == 'ketua')
                    <div class="d-flex justify-content-start mb-2">
                        <form action="{{ route('kas.setujui') }}" method="POST" class="mr-2">
                            @csrf
                            <button type="submit" class="btn btn-success me-1">Setujui</button>
                        </form>
                        <form action="{{ route('kas.tolak') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger me-1">Tolak</button>
                        </form>
                    </div>
                @endif
                
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <a href="{{ route('buku-kas.index') }}" class="btn btn-primary m-1">Lihat Buku Kas</a>
                        @if(auth()->user()->role == 'admin' && $disetujui)
                        <a href="{{ route('kas.view_pdf') }}" class="btn btn-danger m-1">Ekspor PDF</a>
                        @endif
                    </div>
                    <div class="ml-auto">
                        <!-- Form Pencarian -->
                        <form action="{{ route('kas.index') }}" method="GET" class="input-group" style="max-width: 400px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                    <td>{{ $transaksi->unique_id }}</td>
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

                <!-- Navigasi Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $kas->appends(request()->except('page'))->links('pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
