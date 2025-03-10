\@extends('layouts.app_adminkit')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Infaq</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('infaq.index') }}">Data Infaq</a></li>
        <li class="breadcrumb-item active">Edit Infaq</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Infaq
        </div>
        <div class="card-body">
            <form action="{{ route('infaq.update', $infaq->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $infaq->tanggal }}" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" required>{{ $infaq->keterangan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="text" name="jumlah" class="form-control rupiah" id="jumlah" value="{{ $infaq->jumlah }}" required>
                </div>
                @if(auth()->user()->role == 'ketua')
                <div class="mb-3">
                    <label for="komentar" class="form-label">komentar:</label>
                    <textarea name="komentar" class="form-control" id="komentar" rows="3" required>{{ $infaq->komentar }}</textarea>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
