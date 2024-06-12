@extends('layouts.app_adminkit')

@section('title', 'Edit Data Keuangan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Kas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kas.index') }}">Data Keuangan</a></li>
        <li class="breadcrumb-item active">Edit Kas</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Kas
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kas.update', $ka->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $ka->tanggal }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="kategori">Kategori:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pemasukan" value="pemasukan" onchange="showJenis()" {{ $ka->kategori == 'pemasukan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="pemasukan">Pemasukan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="pengeluaran" value="pengeluaran" onchange="showJenis()" {{ $ka->kategori == 'pengeluaran' ? 'checked' : '' }}>
                        <label class="form-check-label" for="pengeluaran">Pengeluaran</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="jenis">Jenis:</label>
                    <select class="form-control" id="jenis" name="jenis" required>
                        <!-- Opsi jenis transaksi akan ditampilkan secara dinamis -->
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="jumlah">Jumlah:</label>
                    <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" value="{{ $ka->jumlah }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $ka->keterangan }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showJenis() {
        const jenis = document.getElementById('jenis');
        const pemasukanOptions = [
            { value: 'infaq', text: 'Infaq' },
            { value: 'zakat', text: 'Zakat' },
            { value: 'qurban', text: 'Qurban' },
            { value: 'parkir', text: 'Parkir' },
            { value: 'kontribusi', text: 'Kontribusi' }
        ];
        const pengeluaranOptions = [
            { value: 'kebersihan', text: 'Kebersihan & Keamanan' },
            { value: 'operasional', text: 'Beban Operasional' },
            { value: 'konsumsi', text: 'Konsumsi' },
            { value: 'perawatan', text: 'Perawatan' },
            { value: 'pengajian', text: 'Pengajian' }
        ];
        jenis.innerHTML = '';
        const kategori = document.querySelector('input[name="kategori"]:checked').value;
        const options = kategori === 'pemasukan' ? pemasukanOptions : pengeluaranOptions;
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option.value;
            opt.textContent = option.text;
            jenis.appendChild(opt);
        });

        // Set the selected value if available
        jenis.value = "{{ $ka->jenis }}";
    }

    // Call showJenis on page load to set the options and select the current value
    document.addEventListener('DOMContentLoaded', function () {
        showJenis();
    });
</script>
@endsection
