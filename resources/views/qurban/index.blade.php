@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Qurban</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('qurban.create') }}" class="btn btn-success mb-2">Tambah Data Qurban</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kelompok</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qurbans as $qurban)
                                    <tr>
                                        <td>{{ $qurban->tanggal }}</td>
                                        <td>{{ $qurban->kelompok }}</td>
                                        <td>{{ $qurban->keterangan }}</td>
                                        <td>{{ format_rupiah($qurban->jumlah) }}</td>
                                        <td>
                                            <a href="{{ route('qurban.edit', $qurban->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('qurban.destroy', $qurban->id) }}" method="POST" style="display: inline">
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
