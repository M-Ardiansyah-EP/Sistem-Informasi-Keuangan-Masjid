@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">RAB List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Rancangan Anggaran Biaya</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            RAB List
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('rabs.create') }}" class="btn btn-primary">Create RAB</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rabs as $rab)
                            <tr>
                                <td>{{ $rab->periode }}</td>
                                <td>{{ $rab->kategori }}</td>
                                <td>{{ $rab->jenis }}</td>
                                <td>{{ $rab->keterangan }}</td>
                                <td class="text-end">{{ format_rupiah($rab->jumlah) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('rabs.edit', $rab->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('rabs.destroy', $rab->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
@endsection
