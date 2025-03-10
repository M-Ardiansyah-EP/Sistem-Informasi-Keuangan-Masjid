@extends('layouts.app_home')

@section('title', 'Beranda')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('images/masjid-ayani.jpg') }}" alt="Masjid Jenderal Ahmad Yani" style="width: 100%; height: 100vh; object-fit: cover;">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Selamat Datang</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">di Masjid Jenderal Ahmad Yani</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more carousel items if needed -->
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1519817650390-64a93db51149?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=400&q=80" alt="Interior Masjid">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="https://plus.unsplash.com/premium_photo-1678483063222-b9cbc116b371?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bW9zcXVlfGVufDB8fDB8fHww" alt="Eksterior Masjid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">Tentang Kami</p>
                        <h1 class="display-6 mb-4">Masjid Jenderal Ahmad Yani: Pusat Ibadah dan Ilmu</h1>
                        <p>Masjid Jenderal Ahmad Yani berdiri sejak tahun 1970 dan telah menjadi pusat kegiatan ibadah dan pendidikan Islam di wilayah kami. Kami berkomitmen untuk menyediakan lingkungan yang nyaman dan inspiratif bagi jamaah untuk beribadah dan menuntut ilmu.</p>
                        <p>Dengan berbagai program dan fasilitas yang kami miliki, kami berupaya untuk terus memakmurkan masjid dan memberikan manfaat bagi masyarakat sekitar.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Sholat Berjamaah
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Kajian Rutin
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Pendidikan Al-Quran
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Program Sosial
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Programs Start -->
    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Program Unggulan</p>
                <h1 class="display-6 mb-4">Kegiatan Utama di Masjid Jenderal Ahmad Yani</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="program-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">Senin - Jumat</div>
                            <h3 class="mb-3">Tahsin Al-Quran</h3>
                            <span>Program belajar membaca Al-Quran dengan tajwid yang benar untuk semua usia</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="https://images.unsplash.com/photo-1651293478838-1f51675131c5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y2VyYW1haHxlbnwwfHwwfHx8MA%3D%3D" alt="Tahsin Al-Quran">
                            <div class="program-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-plus text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="program-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">Senin - Jumat</div>
                            <h3 class="mb-3">Tahsin Al-Quran</h3>
                            <span>Program belajar membaca Al-Quran dengan tajwid yang benar untuk semua usia</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="https://images.unsplash.com/photo-1652751206921-b1e98dcac14d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWVuZ2FqaXxlbnwwfHwwfHx8MA%3D%3D" alt="Tahsin Al-Quran">
                            <div class="program-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-plus text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="program-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">Senin - Jumat</div>
                            <h3 class="mb-3">Tahsin Al-Quran</h3>
                            <span>Program belajar membaca Al-Quran dengan tajwid yang benar untuk semua usia</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="https://images.unsplash.com/photo-1629273229664-11fabc0becc0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8YWwlMjBxdXInYW58ZW58MHx8MHx8fDA%3D" alt="Tahsin Al-Quran">
                            <div class="program-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-plus text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more program items as needed -->
            </div>
        </div>
    </div>
    <!-- Programs End -->

    <!-- Services Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-primary text-uppercase mb-2">Layanan Kami</p>
                    <h1 class="display-6 mb-4">Apa yang Kami Tawarkan untuk Umat?</h1>
                    <p class="mb-5">Masjid Jenderal Ahmad Yani menyediakan berbagai layanan untuk memenuhi kebutuhan spiritual dan sosial jamaah kami.</p>
                    <div class="row gy-5 gx-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-mosque text-white"></i>
                                </div>
                                <h5 class="mb-0">Sholat Berjamaah</h5>
                            </div>
                            <span>Lima waktu sholat berjamaah setiap hari</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-quran text-white"></i>
                                </div>
                                <h5 class="mb-0">Kajian Islam</h5>
                            </div>
                            <span>Kajian rutin mingguan dengan berbagai tema</span>
                        </div>
                        <!-- Add more service items as needed -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1685186113147-715dec63002e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8c2hvbGF0fGVufDB8fDB8fHww" alt="Layanan 1">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1585036156171-384164a8c675?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&h=400&q=80" alt="Layanan 2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection