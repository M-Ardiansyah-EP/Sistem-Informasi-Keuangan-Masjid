@extends('layouts.app_donatur')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-body p-5">
                    <h1 class="mb-4">Detail Donasi</h1>

                    <h5 class="card-title">Donasi #{{ $donasi->id }}</h5>
                    <p class="card-text"><strong>Tanggal:</strong> {{ $donasi->tanggal }}</p>
                    <p class="card-text"><strong>ID Pembayaran:</strong> {{ $donasi->order_id }}</p>
                    <p class="card-text"><strong>Nama Donatur:</strong> {{ $donasi->nama_donatur }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $donasi->email }}</p>
                    <p class="card-text"><strong>Jumlah:</strong> {{ format_rupiah($donasi->jumlah) }}</p>
                    <p class="card-text"><strong>Status Pembayaran:</strong> {{ $donasi->status_pembayaran }}</p>

                    @if($donasi->status_pembayaran == 'menunggu')
                        <form action="{{ route('donasi.store') }}" method="POST" id="payment-form">
                            @csrf
                            <input type="hidden" name="donasi_id" value="{{ $donasi->id }}">
                            <input type="hidden" name="nama_donatur" value="{{ $donasi->nama_donatur }}">
                            <input type="hidden" name="email" value="{{ $donasi->email }}">
                            <input type="hidden" name="jumlah" value="{{ $donasi->jumlah }}">
                            <button type="submit" class="btn btn-primary mt-3">Lanjutkan Pembayaran</button>
                        </form>
                    @else
                        <a href="{{ route('donasi.download-pdf', $donasi->id) }}" class="btn btn-danger mt-3">Unduh PDF</a>
                    @endif

                    <a href="{{ route('donasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
