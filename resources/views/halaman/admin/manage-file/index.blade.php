@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List File</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">List File</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                @foreach ($files as $item)
                    <div class="col-lg-3 col-md-6 mb-4"> <!-- Mengatur agar dalam satu baris ada 4 card di layar besar -->
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="{{ asset('/storage/' . $item->thumbnail) }}" alt="Profile"
                                    class="rounded-circle">
                                <h2>{{ $item->user->name }}</h2>
                                <h3>{{ $item->judul }}</h3>
                                <h5>{{ $item->kategorifile->nama_kategori_file }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
