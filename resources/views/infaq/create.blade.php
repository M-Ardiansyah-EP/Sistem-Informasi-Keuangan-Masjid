@extends('layouts.app_adminkit')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Infaq</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('infaq.index') }}">Data Infaq</a></li>
        <li class="breadcrumb-item active">Tambah Infaq</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus-circle me-1"></i>
            Tambah Infaq
        </div>
        <div class="card-body">
            <form action="{{ route('infaq.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="text" name="jumlah" class="form-control rupiah" id="jumlah" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
