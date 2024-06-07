@extends('layouts.app_adminkit')

@section('title', 'Data Keuangan')

@section('content')
<div class="container">
    <h1>Kas List</h1>
    <a href="{{ route('kas.create') }}" class="btn btn-primary">Create Kas</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-2">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th class="text-end">Pemasukan</th>
                <th class="text-end">Pengeluaran</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kas as $ka)
                <tr>
                    <td>{{ $ka->tanggal }}</td>
                    <td>{{ $ka->kategori }}</td>
                    <td class="text-end">{{ $ka->jenis == 'pemasukan' ? format_rupiah($ka->jumlah) : '-' }}</td>
                    <td class="text-end">{{ $ka->jenis == 'pengeluaran' ? format_rupiah($ka->jumlah) : '-' }}</td>
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
                <td colspan="2" class="text-center">Total</td>
                <td class="text-end">{{ format_rupiah($totalpemasukan) }}</td>
                <td class="text-end">{{ format_rupiah($totalpengeluaran) }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="mt-4">
        <h3>Saldo Akhir: {{ format_rupiah($saldo_akhir_total) }}</h3>
    </div>
</div>
@endsection
