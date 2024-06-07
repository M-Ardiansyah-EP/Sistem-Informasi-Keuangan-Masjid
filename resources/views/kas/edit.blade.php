@extends('layouts.app_adminkit')

@section('title', 'Data Keuangan')

@section('content')
<div class="container">
    <h1>Edit Kas</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kas.update', $ka->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $ka->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $ka->kategori }}">
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <div class="radio-group">
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pemasukan" {{ $ka->jenis == 'pemasukan' ? 'checked' : '' }}>
                        Pemasukan
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pengeluaran" {{ $ka->jenis == 'pengeluaran' ? 'checked' : '' }}>
                        Pengeluaran
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" value="{{ $ka->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3" >Update</button>
    </form>
</div>
@endsection
