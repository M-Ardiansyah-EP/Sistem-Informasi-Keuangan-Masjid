@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
<div class="container">
    <h1>Edit RAB</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rabs.update', $rab->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="periode">Periode:</label>
            <input type="date" class="form-control" id="periode" name="periode" value="{{ $rab->periode }}" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $rab->kategori }}">
        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <div class="radio-group">
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pemasukan" {{ $rab->jenis == 'pemasukan' ? 'checked' : '' }}>
                        Pemasukan
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pengeluaran" {{ $rab->jenis == 'pengeluaran' ? 'checked' : '' }}>
                        Pengeluaran
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $rab->keterangan }}</textarea>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" value="{{ $rab->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
