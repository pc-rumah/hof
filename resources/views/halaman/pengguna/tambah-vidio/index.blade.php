@extends('layouts.index')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Vidio</li>
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
                            <h3>Halaman Vidio</h3>
                        </div>
                        <div class="col-lg-10">
                            <a href="{{ route('tambahvidio.create') }}" type="button" class="btn btn-primary">Tambah
                                Foto</a>
                        </div>
                        {{-- pesan session --}}
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        {{-- end pesan session --}}
                    </div>
                    <hr class="hr">
                    <div class="tab-content pt-2">
                        <section class="section">
                            <div class="row align-items-top">
                                @foreach ($data as $item)
                                    <div class="col-lg-3">
                                        <!-- Card with titles, buttons, and links -->
                                        <div class="card h-100">
                                            <div class="gallery-item h-100 position-relative">
                                                <img src="{{ asset('/storage/' . $item->thumbnail) }}"
                                                    alt="{{ $item->judul }}" class="img-fluid">
                                                <div
                                                    class="position-absolute top-50 start-50 translate-middle text-center">
                                                    <button type="button" class="btn btn-primary btn-lg"
                                                        data-bs-toggle="modal" data-bs-target="#videoModal"
                                                        onclick="setVideoSource('{{ asset('/storage/' . $item->video) }}')">
                                                        <i class="bi bi-play-circle"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                <h5 class="card-subtitle mb-2 text-muted">{{ $item->durasi }}</h5>
                                                <h5 class="card-subtitle mb-2 text-muted">{{ $item->views }}x Dilihat
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    {{ $item->kategori->nama_kategori }}</h6>
                                                <p class="card-text">{{ $item->deskripsi }}</p>
                                                <div class="row">
                                                    <div class="col-6 p-1">
                                                        <a href="{{ route('tambahvidio.edit', $item) }}"
                                                            class="btn btn-primary w-100">Edit</a>
                                                    </div>
                                                    <div class="col-6 p-1">
                                                        <form action="{{ route('tambahvidio.destroy', $item) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger w-100">Delete</button>
                                                        </form>
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
</main>


{{-- modal vidio --}}

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Video Player</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video id="videoPlayer" controls class="w-100">
                    <!-- Source video akan diisi melalui JavaScript -->
                </video>
            </div>
        </div>
    </div>
</div>
