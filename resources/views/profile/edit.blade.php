@extends('layouts.app_donatur')

@section('title', 'Edit Profil')

@section('content')
    <div class="container-fluid px-4">
            <h1 class="mt-4 text-center">Edit Profil Akun</h1>

        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Perbarui Informasi Profil</h5>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Perbarui Kata Sandi</h5>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Hapus Akun</h5>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection