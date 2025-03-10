@extends('layouts.app_adminkit')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Infaq</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Infaq</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-hand-holding-usd me-1"></i>
            Data Infaq
        </div>
        <div class="card-body">
            @if(auth()->user()->role == 'admin')
            <div class="d-flex justify-content-start mb-2">
                <a href="{{ route('infaq.create') }}" class="btn btn-success">Tambah Infaq</a>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Komentar</th>
                            @if(auth()->user()->role == 'ketua')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infaq as $data)
                            <tr>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ format_rupiah($data->jumlah) }}</td>
                                <td>{{ $data->komentar }}</td>
                                @if(auth()->user()->role == 'ketua' && \Carbon\Carbon::parse($data->tanggal)->isCurrentMonth())
                                <td>
                                    <a href="{{ route('infaq.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('infaq.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
