@extends('layouts.app_home')

@section('title', 'Donasi')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s" style="background: url('{{ asset('images/masjid-ahmadyani.jpg') }}') center center no-repeat; background-size: cover;">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Donasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Donasi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Donasi Sekarang Start -->
<div class="container-xxl py-6">
  <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
          <h1 class="display-6 mb-4">Donasi Sekarang</h1>
      </div>
      <div class="row g-4 justify-content-center">
          @foreach($indexHome as $dashboard)
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100 shadow">
                  <div class="text-center p-4">
                      <h3 class="mb-3">{{ $dashboard->title }}</h3>
                      <p>{{ $dashboard->content }}</p>
                  </div>
                  <div class="position-relative mt-auto">
                      <img class="img-fluid" src="{{ asset('images/' . $dashboard->image) }}" alt="{{ $dashboard->title }}">
                      <div class="product-overlay">
                          <a class="btn btn-lg-square btn-outline-light rounded-circle" href="https://www.example.com/payment/dummy"><i class="fa fa-hand-holding-heart text-primary"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
</div>
<!-- Donasi Sekarang End -->

<!-- Daftar Donasi Start -->
<div class="container-xxl py-6 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h2 class="display-6 mb-4">Daftar Untuk Menjadi Donatur</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center wow fadeInUp" data-wow-delay="0.1s">
                <p class="mb-4">Bergabunglah dengan kami untuk membuat perbedaan. Daftar sekarang untuk menjadi donatur tetap Masjid Jenderal Ahmad Yani!</p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">Daftar</a>
                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Masuk</a>
            </div>
        </div>
    </div>
</div>
<!-- Daftar Donasi End -->

<!-- Modal Donasi -->
<div class="modal fade" id="modalDonasi" tabindex="-1" aria-labelledby="labelModalDonasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white border-0">
          <h5 class="modal-title" id="labelModalDonasi">
            <i class="fas fa-hand-holding-heart me-2"></i>Jadilah Bagian dari Kebaikan
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body text-center p-4">
          <img src="{{ asset('images/donatur.png') }}" alt="Ilustrasi Donasi" class="img-fluid mb-3" style="max-height: 200px;">
          <h4 class="mb-3">Bersama, Kita Bisa Membuat Perbedaan</h4>
          <p class="mb-4">Setiap donasi Anda, sekecil apapun, dapat memberikan harapan dan mengubah kehidupan seseorang. Mari bergabung dalam misi mulia ini!</p>
          <div class="d-grid gap-2">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
              <i class="fas fa-user-plus me-2"></i>Daftar Sebagai Donatur
            </a>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Nanti Saja</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modalDonasi = new bootstrap.Modal(document.getElementById('modalDonasi'), {
        keyboard: false
      });
      setTimeout(function() {
        modalDonasi.show();
      }, 1000); // Menampilkan modal setelah 1 detik
    });
  </script>
@endpush

@endsection
