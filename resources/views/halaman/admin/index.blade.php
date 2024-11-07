@extends('layouts.index')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- User Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">User</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_user }} User</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End User Card -->

                        <!-- Foto Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Foto</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_foto }} Foto</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Foto Card -->

                        <!-- Vidio Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Vidio</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-play"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_vidio }} Vidio</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Vidio Card -->

                        <!-- File Card -->
                        <div class="col-xxl-3 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">File</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-archive"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_file }} File</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End File Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection
