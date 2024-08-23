@extends('layouts.index')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Cards</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/pengguna">Home</a></li>
                    <li class="breadcrumb-item active">Cards</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="row">
                            <div class="col-lg-2">
                                <h3>Halaman Foto</h3>
                            </div>
                            <div class="col-lg-10">
                                <a href="{{ route('tambahfoto.create') }}" type="button" class="btn btn-primary">Tambah
                                    Foto</a>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="tab-content pt-2">
                            <section class="section">
                                <div class="row align-items-top">
                                    <div class="col-lg-3">
                                        <!-- Card with titles, buttons, and links -->
                                        <div class="card">
                                            <img src="{{ asset('dashboard/assets/img/card.jpg') }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card with titles, buttons, and links</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of
                                                    the card's content.</p>
                                                <div class="row">
                                                    <div class="col-6 p-1">
                                                        <a href="#" class="btn btn-primary w-100">Edit</a>
                                                    </div>
                                                    <div class="col-6 p-1">
                                                        <a href="#" class="btn btn-danger w-100">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card with titles, buttons, and links -->
                                    </div>
                                </div>
                            </section>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>


    </main><!-- End #main -->
@endsection
