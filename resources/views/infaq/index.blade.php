@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Infaq</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('infaq.create') }}" class="btn btn-success mb-2">Tambah Infaq</a>
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
                                @foreach ($infaq as $data)
                                    <tr>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ format_rupiah($data->jumlah) }}</td>
                                        <td>
                                            <a href="{{ route('infaq.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('infaq.destroy', $data->id) }}" method="POST" style="display: inline">
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
