@extends('layouts.app_adminkit')

@section('title', 'Rancangan Anggaran Biaya')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit RAB</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('rabs.index') }}">Rancangan Anggaran Biaya</a></li>
        <li class="breadcrumb-item active">Edit RAB</li>
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
            <i class="fas fa-edit me-1"></i>
            Edit RAB
        </div>
        <div class="card-body">
            <form action="{{ route('rabs.update', $rab->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="periode" class="form-label">Periode:</label>
                    <input type="date" class="form-control" id="periode" name="periode" value="{{ $rab->periode }}" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pemasukan" value="pemasukan" {{ $rab->kategori == 'pemasukan' ? 'checked' : '' }} onchange="showJenis()" required>
                        <label class="form-check-label" for="pemasukan">Pemasukan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pengeluaran" value="pengeluaran" {{ $rab->kategori == 'pengeluaran' ? 'checked' : '' }} onchange="showJenis()" required>
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
                    <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $rab->keterangan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah:</label>
                    <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" value="{{ $rab->jumlah }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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
            options = pemasukan;
        } else if (kategori === 'pengeluaran') {
            options = pengeluaran;
        }

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            opt.selected = option === "{{ $rab->jenis }}";
            jenisSelect.appendChild(opt);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        showJenis();
    });
</script>
@endsection
