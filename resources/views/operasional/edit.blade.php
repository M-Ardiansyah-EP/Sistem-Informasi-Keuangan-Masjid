@extends('layouts.app_adminkit')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Data Operasional</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('operasional.index') }}">Data Operasional</a></li>
        <li class="breadcrumb-item active">Edit Data Operasional</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Data Operasional
        </div>
        <div class="card-body">
            <form action="{{ route('operasional.update', $operasional->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $operasional->tanggal }}" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $operasional->keterangan }}" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="text" name="jumlah" class="form-control rupiah" id="jumlah" value="{{ $operasional->jumlah }}" required>
                </div>
                @if(auth()->user()->role == 'ketua')
                <div class="mb-3">
                    <label for="komentar" class="form-label">komentar:</label>
                    <input type="text" name="komentar" class="form-control" id="komentar" value="{{ $operasional->komentar }}" required>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
