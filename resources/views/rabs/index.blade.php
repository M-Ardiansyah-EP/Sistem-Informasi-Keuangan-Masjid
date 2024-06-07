@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
<div class="container">
    <h1>RAB List</h1>
    <a href="{{ route('rabs.create') }}" class="btn btn-primary">Create RAB</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-2 table-bordered">
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
                        <a href="{{ route('rabs.edit', $rab->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rabs.destroy', $rab->id) }}" method="POST" style="display:inline;">
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
@endsection
