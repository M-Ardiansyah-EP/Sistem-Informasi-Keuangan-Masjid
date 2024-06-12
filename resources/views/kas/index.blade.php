@extends('layouts.app_adminkit')

@section('title', 'Data Keuangan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Keuangan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Keuangan</li>
    </ol>

    <div class="row">
        <!-- Card for Total Pemasukan -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Pemasukan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5>{{ format_rupiah($totalpemasukan) }}</h5>
                </div>
            </div>
        </div>

        <!-- Card for Total Pengeluaran -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Pengeluaran</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5>{{ format_rupiah($totalpengeluaran) }}</h5>
                </div>
            </div>
        </div>

        <!-- Card for Saldo Akhir -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Saldo Akhir</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h5>{{ format_rupiah($saldo_akhir_total) }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kas List
        </div>
        <div class="card-body">
            <a href="{{ route('kas.create') }}" class="btn btn-primary mb-3">Create Kas</a>

            @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th class="text-end">Pemasukan</th>
                            <th class="text-end">Pengeluaran</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kas as $ka)
                            <tr>
                                <td>{{ $ka->tanggal }}</td>
                                <td>{{ $ka->jenis }}</td>
                                <td>{{ $ka->keterangan }}</td>
                                <td class="text-end">{{ $ka->kategori == 'pemasukan' ? format_rupiah($ka->jumlah) : '-' }}</td>
                                <td class="text-end">{{ $ka->kategori == 'pengeluaran' ? format_rupiah($ka->jumlah) : '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kas.edit', $ka->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('kas.destroy', $ka->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-center">Total</td>
                            <td class="text-end">{{ format_rupiah($totalpemasukan) }}</td>
                            <td class="text-end">{{ format_rupiah($totalpengeluaran) }}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="mt-4">
                    <h3>Saldo Akhir: {{ format_rupiah($saldo_akhir_total) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
