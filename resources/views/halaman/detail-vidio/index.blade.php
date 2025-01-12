@extends('includes.detail')

@section('content')
    <!-- Gallery Details Section -->
    <section id="gallery-details" class="gallery-details section">
        <div class="container" data-aos="fade-up">
            <div class="d-flex">
                <div class="video-container w-50 h-50 justify-content-center">
                    <video controls>
                        <source src="{{ URL::asset("/storage/$vidio->video") }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="row justify-content-between gy-4 mt-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="portfolio-description">
                        <h2>Deskripsi Singkat Dari Pemilik</h2>
                        <p>
                            {{ $vidio->deskripsi }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>{{ $vidio->kategori->nama_kategori }}</li>
                            <li><strong>Client</strong>{{ $vidio->user->name }}</li>
                            <li><strong>Project date</strong>{{ $vidio->created_at }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Gallery Details Section -->
@endsection
