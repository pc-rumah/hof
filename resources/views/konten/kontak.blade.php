@extends('includes.detail')

@section('content')
    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="info-wrap" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-5">

                    <div class="col-lg-3">
                        <div class="info-item d-flex align-items-center">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Location</h3>
                                <p>{{ $data->alamat }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <div class="info-item d-flex align-items-center">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call</h3>
                                <p>{{ $data->no_telp }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <div class="info-item d-flex align-items-center">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>{{ $data->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="info-item d-flex align-items-center">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Github</h3>
                                <p>{{ $data->github }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Item -->
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection
