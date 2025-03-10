@extends('layouts.app_adminkit')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Item Laporan Keuangan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Item</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit me-1"></i>
                        Form Edit Data Laporan Keuangan
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.update', $dashboard->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $dashboard->title }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="content">Konten</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required>{{ $dashboard->content }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Gambar</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            @if($dashboard->image)
                                <div class="form-group mb-3">
                                    <label>Gambar Saat Ini</label><br>
                                    <img src="{{ asset('images/' . $dashboard->image) }}" alt="Image" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
