@extends('layouts.app_adminkit')

@section('content')
    <h1 class="mt-4">Detail Buku Kas - {{ $bukuKas->periode->format('F Y') }}</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Buku Kas</h5>
            <p class="card-text">Saldo Awal: {{ number_format($bukuKas->saldo_awal) }}</p>
            <p class="card-text">Total Pemasukan: {{ number_format($bukuKas->total_pemasukan) }}</p>
            <p class="card-text">Total Pengeluaran: {{ number_format($bukuKas->total_pengeluaran) }}</p>
            <p class="card-text">Saldo Akhir: {{ number_format($bukuKas->saldo_akhir) }}</p>
        </div>
    </div>

    <h2>Detail Transaksi</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailTransaksi as $transaksi)
                            <tr>
                                <td>{{ $transaksi['tanggal'] }}</td>
                                <td>{{ $transaksi['kategori'] }}</td>
                                <td>{{ $transaksi['jenis'] }}</td>
                                <td>{{ $transaksi['keterangan'] }}</td>
                                <td>{{ number_format($transaksi['jumlah']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
