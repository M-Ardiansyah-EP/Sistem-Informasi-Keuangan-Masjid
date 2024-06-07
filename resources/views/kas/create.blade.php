@extends('layouts.app_adminkit')

@section('title', 'Data Keuangan')

@section('content')
<div class="container">
    <h1>Create Kas</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori">
        </div>
        <div class="form-group">
            <label for="jenis">Jenis:</label>
            <div class="radio-group">
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pemasukan">
                        Pemasukan
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="jenis" value="pengeluaran">
                        Pengeluaran
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
