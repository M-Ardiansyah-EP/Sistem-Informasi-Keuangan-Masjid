@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Zakat</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('zakat.update', $zakat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $zakat->tanggal }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <select name="jenis" class="form-control">
                                    <option value="zakat_fitrah" {{ $zakat->jenis == 'zakat_fitrah' ? 'selected' : '' }}>Zakat Fitrah</option>
                                    <option value="zakat_maal" {{ $zakat->jenis == 'zakat_maal' ? 'selected' : '' }}>Zakat Maal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control" value="{{ $zakat->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" class="form-control">{{ $zakat->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" class="form-control">{{ $zakat->keterangan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="text" name="jumlah" class="form-control rupiah" value="{{ $zakat->jumlah }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
