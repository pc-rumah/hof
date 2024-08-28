@extends('layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cards</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/pengguna">Home</a></li>
                    <li class="breadcrumb-item active">Foto</li>
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
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                        </div>
                        <hr class="hr">
                        <div class="tab-content pt-2">
                            <section class="section">
                                <div class="row align-items-top">
                                    @foreach ($data as $item)
                                        <div class="col-lg-3">
                                            <!-- Card with titles, buttons, and links -->
                                            <div class="card h-100">
                                                <img style="border-bottom: 2px solid black"
                                                    src="{{ asset('/storage/' . $item->foto) }}" class="card-img-top"
                                                    alt="{{ $item->judul }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $item->kategori->nama_kategori }}</h6>
                                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                                    <div class="row">
                                                        <div class="col-6 p-1">
                                                            <a href="{{ route('tambahfoto.edit', $item) }}"
                                                                class="btn btn-primary w-100">Edit</a>
                                                        </div>
                                                        <div class="col-6 p-1">

                                                            <button type="button" class="btn btn-danger w-100"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#confirmDeletefoto">Delete</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card with titles, buttons, and links -->
                                        </div>
                                    @endforeach
                                </div>
                            </section>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>


    </main><!-- End #main -->
@endsection
