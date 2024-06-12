@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Data Parkir</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('parkir.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nomor_kendaraan">Nomor Kendaraan:</label>
                                <input type="text" name="nomor_kendaraan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kendaraan">Jenis Kendaraan:</label>
                                <input type="text" name="jenis_kendaraan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu_masuk">Waktu Masuk:</label>
                                <input type="date" name="waktu_masuk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu_keluar">Waktu Keluar:</label>
                                <input type="date" name="waktu_keluar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya:</label>
                                <input type="text" name="biaya" class="form-control rupiah">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
