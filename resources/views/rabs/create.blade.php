@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create RAB</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('rabs.index') }}">Rancangan Anggaran Biaya</a></li>
        <li class="breadcrumb-item active">Create RAB</li>
    </ol>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Create RAB
        </div>
        <div class="card-body">
            <form action="{{ route('rabs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="periode" class="form-label">Periode:</label>
                    <input type="date" class="form-control" id="periode" name="periode" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pemasukan" value="pemasukan" onchange="showJenis()" required>
                        <label class="form-check-label" for="pemasukan">Pemasukan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pengeluaran" value="pengeluaran" onchange="showJenis()" required>
                        <label class="form-check-label" for="pengeluaran">Pengeluaran</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis:</label>
                    <select class="form-control" id="jenis" name="jenis" required>
                        <!-- Opsi jenis transaksi akan ditampilkan secara dinamis -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    const pemasukan = @json($pemasukan);
    const pengeluaran = @json($pengeluaran);

    function showJenis() {
        const kategori = document.querySelector('input[name="kategori"]:checked').value;
        const jenisSelect = document.getElementById('jenis');
        jenisSelect.innerHTML = '';

        let options = [];
        if (kategori === 'pemasukan') {
            options = {!! json_encode($pemasukan) !!};
        } else if (kategori === 'pengeluaran') {
            options = {!! json_encode($pengeluaran) !!};
        }

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            jenisSelect.appendChild(opt);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('input[name="kategori"]:checked')) {
            showJenis();
        }
    });
</script>
@endsection
