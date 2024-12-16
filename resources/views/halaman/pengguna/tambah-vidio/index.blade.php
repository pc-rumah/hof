@extends('layouts.index')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/pengguna">Home</a></li>
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
                        <div class="col-lg-3">
                            <h3>Halaman Vidio</h3>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('tambahvidio.create') }}" type="button" class="btn btn-primary">Tambah
                                Vidio</a>
                        </div>
                        <div class="col-lg-3">
                            @if (session('success') || request()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') ?? request()->get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        {{-- pesan session --}}
                        {{-- @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif --}}

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
                                                    alt="{{ $item->judul }}" class="img-fluid hehe">
                                                <div
                                                    class="position-absolute top-50 start-50 translate-middle text-center">
                                                    <a type="button" class="btn btn-primary btn-lg terbang"
                                                        data-bs-toggle="modal" data-bs-target="#videoModal"
                                                        onclick="setVideoSource('{{ asset('/storage/' . $item->video) }}')">
                                                        <i class="bi bi-play-circle"></i>
                                                    </a>
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
                                                        <button type="submit" class="btn btn-danger w-100"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeletevidio{{ $item->id }}">Delete</button>

                                                        <!-- Modal delete vidio -->
                                                        @if (isset($item))
                                                            <div class="modal fade"
                                                                id="confirmDeletevidio{{ $item->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="confirmDeleteModal{{ $item->id }}Label"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="confirmDeleteModal{{ $item->id }}Label">
                                                                                Konfirmasi
                                                                                Hapus Vidio</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin ingin menghapus Vidio ini?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Batal</button>
                                                                            <form id="deleteForm"
                                                                                action="{{ route('tambahvidio.destroy', $item->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
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
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Lihat Vidio</h5>
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
{{-- modal vidio --}}
