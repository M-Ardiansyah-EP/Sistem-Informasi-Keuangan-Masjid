@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Kontribusi</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('kontribusi.create') }}" class="btn btn-success mb-2">Tambah Data Kontribusi</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontribusis as $kontribusi)
                                    <tr>
                                        <td>{{ $kontribusi->tanggal }}</td>
                                        <td>{{ $kontribusi->keterangan }}</td>
                                        <td>{{ format_rupiah($kontribusi->jumlah) }}</td>
                                        <td>
                                            <a href="{{ route('kontribusi.edit', $kontribusi->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('kontribusi.destroy', $kontribusi->id) }}" method="POST" style="display: inline">
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
