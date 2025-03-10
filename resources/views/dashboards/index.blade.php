@extends('layouts.app_adminkit')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Selamat Datang {{ Auth::user()->name }}</h1>
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman {{ Auth::user()->name }} masjid Jenderal Ahmad Yani</li>
        </ol>
        
        @if(Auth::user()->role == 'admin')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel input gambar QRIS
            </div>
            <div class="card-body">
                @if($dashboards->isEmpty())
                    <div class="mb-3">
                        <a href="{{ route('dashboard.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dashboards as $dashboard)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dashboard->title }}</td>
                                <td>{{ $dashboard->content }}</td>
                                <td>
                                    @if($dashboard->image)
                                        <img src="{{ asset('images/' . $dashboard->image) }}" alt="Image" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        Tidak Ada Gambar
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.edit', $dashboard->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('dashboard.destroy', $dashboard->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
