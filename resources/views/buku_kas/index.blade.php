@extends('layouts.app_adminkit')

@section('content')
    <h1 class="mt-4">Buku Kas</h1>
    <a href="{{ route('buku-kas.simpan') }}" onclick="event.preventDefault(); document.getElementById('simpan-form').submit();" class="btn btn-primary mb-4">
        Simpan Buku Kas Bulan Lalu
    </a>
    <form id="simpan-form" action="{{ route('buku-kas.simpan') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="row">
        @foreach($bukuKas as $bk)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bk->periode->format('F Y') }}</h5>
                        <p class="card-text">Saldo Awal: {{ number_format($bk->saldo_awal) }}</p>
                        <p class="card-text">Total Pemasukan: {{ number_format($bk->total_pemasukan) }}</p>
                        <p class="card-text">Total Pengeluaran: {{ number_format($bk->total_pengeluaran) }}</p>
                        <p class="card-text">Saldo Akhir: {{ number_format($bk->saldo_akhir) }}</p>
                        <a href="{{ route('buku-kas.show', $bk->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $bukuKas->links('pagination') }}
    </div>
@endsection
