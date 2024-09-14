@extends('includes.detail')
@section('content')
    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="{{ asset('profile_images/' . $data->image) }}" class="img-fluid" alt="{{ $data->title }}">
                </div>

                <div class="col-lg-5 content">
                    <h2>{{ $data->title }}</h2>
                    <p class="fst-italic py-3">
                        {{ $data->deskripsi }}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>

                                <li><i class="bi bi-chevron-right"></i> <strong>Telepon:</strong>
                                    <span>{{ $data->notelp }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Deskripsi:</strong>
                                    <span>{{ $data->description }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Kota:</strong>
                                    <span>{{ $data->kota }}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section><!-- /About Section -->
@endsection
