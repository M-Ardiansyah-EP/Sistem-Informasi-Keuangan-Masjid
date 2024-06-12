@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Zakat</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('zakat.create') }}" class="btn btn-success mb-2">Tambah Zakat</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zakats as $zakat)
                                    <tr>
                                        <td>{{ $zakat->tanggal }}</td>
                                        <td>{{ $zakat->jenis }}</td>
                                        <td>{{ $zakat->nama }}</td>
                                        <td>{{ $zakat->alamat }}</td>
                                        <td>{{ $zakat->keterangan }}</td>
                                        <td>{{ format_rupiah($zakat->jumlah) }}</td>
                                        <td>
                                            <a href="{{ route('zakat.edit', $zakat->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('zakat.destroy', $zakat->id) }}" method="POST" style="display: inline">
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
