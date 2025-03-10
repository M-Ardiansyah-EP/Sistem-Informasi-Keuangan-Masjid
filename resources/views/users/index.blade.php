@extends('layouts.app_adminkit')

@section('title', 'Data Donatur')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Donatur</li>
    </ol>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->role == 'user')
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->jenis_kelamin }}</td>
                                    <td>{{ $user->tanggal_lahir }}</td>
                                    <td>{{ $user->nomor_telepon }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>
                                        @php
                                            $phoneNumber = preg_replace('/[^0-9]/', '', $user->nomor_telepon);
                                            if (substr($phoneNumber, 0, 1) === '0') {
                                                $phoneNumber = '62' . substr($phoneNumber, 1);
                                            }
                                            $message = "Halo {$user->name}, ini adalah pengingat untuk donasi bulanan Anda. Terima kasih atas dukungan Anda yang terus menerus!";
                                        @endphp
                                        <div class="action-buttons">
                                            <a href="https://wa.me/{{ $phoneNumber }}?text={{ urlencode($message) }}" target="_blank" class="btn btn-success btn-sm w-100 mb-2">
                                                <i class="fab fa-whatsapp"></i> Kirim Pengingat
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="w-100">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .action-buttons {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .action-buttons .btn,
    .action-buttons form {
        width: 100%;
    }
    .action-buttons .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.25rem;
    }
    .action-buttons form {
        margin-bottom: 0;
    }
</style>
@endpush