@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List user</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">List User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                @foreach ($datauser as $item)
                    <div class="col-lg-3 col-md-6 mb-4"> <!-- Mengatur agar dalam satu baris ada 4 card di layar besar -->
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="{{ asset('/storage/' . $item->photo) }}" alt="Profile" class="rounded-circle">
                                <h2>{{ $item->name }}</h2>
                                <div class="social-links mt-2">
                                    <a href="{{ $item->facebook }}" target="_blank" class="facebook"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="{{ $item->instagram }}" target="_blank" class="instagram"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="{{ $item->linkedin }}" target="_blank" class="linkedin"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </main>
@endsection
