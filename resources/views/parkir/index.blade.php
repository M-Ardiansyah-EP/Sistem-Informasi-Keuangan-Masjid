@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Parkir</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('parkir.create') }}" class="btn btn-success mb-2">Tambah Data Parkir</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama</th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                    <th>Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parkirs as $parkir)
                                    <tr>
                                        <td>{{ $parkir->nomor_kendaraan }}</td>
                                        <td>{{ $parkir->jenis_kendaraan }}</td>
                                        <td>{{ $parkir->nama }}</td>
                                        <td>{{ $parkir->waktu_masuk }}</td>
                                        <td>{{ $parkir->waktu_keluar }}</td>
                                        <td>{{ format_rupiah($parkir->biaya) }}</td>
                                        <td>
                                            <a href="{{ route('parkir.edit', $parkir->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('parkir.destroy', $parkir->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
