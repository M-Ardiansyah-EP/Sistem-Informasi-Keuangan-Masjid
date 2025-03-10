@extends('layouts.app_donatur')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-body p-5">
                    <h1 class="mb-4">Pembayaran Donasi</h1>

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

                    <h5 class="card-title">Donasi #{{ $donasi->id }}</h5>
                    <p class="card-text"><strong>Tanggal:</strong> {{ $donasi->tanggal }}</p>
                    <p class="card-text"><strong>ID Pembayaran:</strong> {{ $donasi->order_id }}</p>
                    <p class="card-text"><strong>Nama Donatur:</strong> {{ $donasi->nama_donatur }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $donasi->email }}</p>
                    <p class="card-text"><strong>Jumlah:</strong> {{ format_rupiah($donasi->jumlah) }}</p>

                    <button id="pay-button" class="btn btn-success mt-4">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan script Midtrans -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                verifyPayment(result);
            },
            onPending: function(result) {
                alert("Menunggu pembayaran!");
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
            },
            onClose: function() {
                alert('Anda menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    });

    function verifyPayment(result) {
        fetch('{{ route("donasi.verify", $donasi->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(result)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Pembayaran berhasil! Status: " + data.status);
                window.location.href = '{{ route("donasi.index") }}';
            } else {
                alert("Terjadi kesalahan saat memverifikasi pembayaran: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan saat memverifikasi pembayaran.");
        });
    }
</script>

@endsection
