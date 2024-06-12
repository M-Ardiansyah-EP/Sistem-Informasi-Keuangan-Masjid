@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Zakat</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('zakat.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <select name="jenis" class="form-control">
                                    <option value="zakat_fitrah">Zakat Fitrah</option>
                                    <option value="zakat_maal">Zakat Maal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="text" name="jumlah" class="form-control rupiah">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
