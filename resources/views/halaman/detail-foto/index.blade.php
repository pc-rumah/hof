@extends('includes.detail')

@section('content')
    <!-- Gallery Details Section -->
    <section id="gallery-details" class="gallery-details section">

        <div class="container" data-aos="fade-up">
            <div class="portfolio-details-slider swiper init-swiper">

                <div class="swiper-wrapper d-flex justify-content-center">
                    <img class="w-50 h-50" src="{{ asset('/storage/' . $foto->foto) }}" alt="{{ $foto->judul }}">
                </div>
            </div>
            <div class="row justify-content-between gy-4 mt-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="portfolio-description">
                        <h2>Deskripsi Singkat Dari Pemilik</h2>
                        <p>
                            {{ $foto->deskripsi }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>{{ $foto->kategori->nama_kategori }}</li>
                            <li><strong>Client</strong>{{ $foto->user->name }}</li>
                            <li><strong>Project date</strong>{{ $foto->created_at }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Gallery Details Section -->
    <footer id="footer" class="footer footer-center bg-slate-600">
        <div class="container">
            <div class="copyright">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights
                        Reserved</span></p>
            </div>
        </div>
    </footer>
@endsection
