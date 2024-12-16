@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-6">
                <div class="pagetitle">
                    <h1>Dashboard</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->

                <section class="section dashboard">
                    <h1>Selamat Datang <span>{{ auth()->user()->name }}</span></h1>
                </section>

                <div class="">
                    <a href="/" type="button" class="btn btn-primary">Kembali ke Landing Page</a>
                </div>
            </div>
            {{-- batas --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Sistem</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <i class="fab fa-chrome"></i>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $browser }}</h5>
                                <h6 class="text-muted mb-0">Browser</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <i class="fab fa-hashtag"></i>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $browserversi }}</h5>
                                <h6 class="text-muted mb-0">Browser Version</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $os }}</h5>
                                <h6 class="text-muted mb-0">Operating System</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $osversi }}</h5>
                                <h6 class="text-muted mb-0">Version System</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
