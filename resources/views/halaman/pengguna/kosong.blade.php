@extends('includes.kategori')
@section('content')
    <main class="main" id="main">
        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if ($gambar->isEmpty())
                            <div class="swiper-slide">
                                <div class="gallery-item">
                                    <p class="text-center">Foto tidak tersedia</p>
                                </div>
                            </div>
                        @else
                            @foreach ($gambar as $item)
                                <div class="swiper-slide">
                                    <div class="gallery-item">
                                        <img src="{{ asset('/storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                            class="card-img-top">
                                        <div class="gallery-links d-flex align-items-center justify-content-center">
                                            <a href="{{ asset('/storage/' . $item->foto) }}" title="{{ $item->judul }}"
                                                class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                                            <a href="{{ route('detailfoto', ['id' => $item->id]) }}" class="details-link">
                                                <i class="bi bi-link-45deg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- /Gallery Section -->

        <!-- Vidio Section -->
        <section id="gallery" class="gallery section">
            <h1 style="text-align: center">Vidio</h1>
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if ($vidio->isEmpty())
                            <div class="swiper-slide">
                                <div class="gallery-item">
                                    <p class="text-center">Vidio tidak tersedia</p>
                                </div>
                            </div>
                        @else
                            @foreach ($vidio as $item)
                                <div class="swiper-slide">
                                    <div class="gallery-item">
                                        <img src="{{ asset('/storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}"
                                            class="img-fluid">
                                        <div class="gallery-links d-flex align-items-center justify-content-center">
                                            <a href="{{ asset('/storage/' . $item->video) }}" title="{{ $item->judul }}"
                                                class="glightbox preview-link">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="{{ route('detailvidio', ['id' => $item->id]) }}" class="details-link">
                                                <i class="bi bi-link-45deg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
