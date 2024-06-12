@extends('layouts.app_adminkit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Pengajian</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('pengajian.create') }}" class="btn btn-success mb-2">Tambah Data Pengajian</a>
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
                                @foreach ($pengajian as $item)
                                    <tr>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ format_rupiah($item->jumlah) }}</td>
                                        <td>
                                            <a href="{{ route('pengajian.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('pengajian.destroy', $item->id) }}" method="POST" style="display: inline">
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
