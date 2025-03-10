@extends('layouts.app_donatur')

@section('title', 'Daftar Donasi')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-body p-5">
                        <h1 class="mb-4">Daftar Donasi</h1>
                        <a href="{{ route('donasi.create') }}" class="btn btn-success mb-4">
                            <i class="bi bi-plus-circle me-2"></i>Buat Donasi Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
