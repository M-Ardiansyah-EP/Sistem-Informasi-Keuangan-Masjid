@extends('layouts.app_adminkit')

@section('title', 'Riwayat Pembayaran Donasi')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Riwayat Pembayaran Donasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Riwayat Pembayaran</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Donasi</h5>
                    <p>Total Semua Donasi: {{ format_rupiah($totalSemuaDonasi) }}</p>
                    <p>Total Bulan Ini: {{ format_rupiah($totalBulanIni) }}</p>
                    <p>Total Bulan Lalu: {{ format_rupiah($totalBulanLalu) }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Donasi per Bulan (Tahun {{ now()->year }})</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totalPerBulan as $item)
                                <tr>
                                    <td>{{ \Carbon\Carbon::create()->month($item->bulan)->format('F') }}</td>
                                    <td>{{ format_rupiah($item->total) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Daftar Transaksi</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>ID Pembayaran</th>
                                    <th>Nama Donatur</th>
                                    <th>Email</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayatPembayaran as $donasi)
                                <tr>
                                    <td>{{ $donasi->tanggal }}</td>
                                    <td>{{ $donasi->order_id }}</td>
                                    <td>{{ $donasi->nama_donatur }}</td>
                                    <td>{{ $donasi->email }}</td>
                                    <td>{{ format_rupiah($donasi->jumlah) }}</td>
                                    <td>{{ $donasi->status_pembayaran }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $riwayatPembayaran->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection
