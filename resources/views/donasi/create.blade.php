@extends('layouts.app_donatur')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-body p-5">
                    <h1 class="mb-4">Buat Donasi Baru</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('donasi.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama_donatur">Nama Donatur</label>
                            <p>{{ Auth::user()->name }}</p>
                            <input type="hidden" name="nama_donatur" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <p>{{ Auth::user()->email }}</p>
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="jumlah">Jumlah Donasi (Rp)</label>
                            <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" required>
                        </div>
                        <button type="submit" class="btn btn-success">Buat Donasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
