@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Rancangan Anggaran Biaya</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Rancangan Anggaran Biaya</li>
        </ol>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Rancangan Anggaran Biaya
            </div>
        
            <div class="card-body">
                @if(auth()->user()->role == 'ketua')
                    <div class="d-flex justify-content-start mb-2">
                        <div class="btn-group mr-2" role="group" aria-label="Setujui atau Tolak">
                            <form action="{{ route('rabs.setujui') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success me-1">Setujui</button>
                            </form>
                            <form action="{{ route('rabs.tolak') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger me-1">Tolak</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-start mb-2">
                        <a href="{{ route('rabs.create') }}" class="btn btn-primary m-1">Tambah Data</a>
                        @if(auth()->user()->role == 'admin' && $disetujui)
                            <a href="{{ route('rabs.view_pdf') }}" class="btn btn-danger m-1">Ekspor PDF</a>
                        @endif
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Program</th>
                                <th>Periode</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th class="text-center">Jumlah</th>
                                @if(auth()->user()->role != 'ketua')
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rabs as $rab)
                                <tr>
                                    <td>{{ $rab->nama }}</td>
                                    <td>{{ $rab->periode }}</td>
                                    <td>{{ $rab->kategori }}</td>
                                    <td>{{ $rab->jenis }}</td>
                                    <td>{!! $rab->keterangan !!}</td>
                                    <td class="text-center">{{ format_rupiah($rab->jumlah) }}</td>
                                    @if(auth()->user()->role != 'ketua')
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('rabs.edit', $rab->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                                <form action="{{ route('rabs.destroy', $rab->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm me-1">Delete</button>
                                                </form>
                                            </div>
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
