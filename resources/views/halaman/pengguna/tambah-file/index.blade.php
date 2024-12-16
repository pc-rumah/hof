@extends('layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cards</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/pengguna">Home</a></li>
                    <li class="breadcrumb-item active">File</li>
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
                                <h3>Halaman File</h3>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('tambahfile.create') }}" type="button" class="btn btn-primary">Tambah
                                    File</a>
                            </div>
                            <div class="col-lg-4">
                                @if (session('success') || request()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') ?? request()->get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                            </div>
                            {{-- @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif --}}

                        </div>
                        <hr class="hr">
                        <div class="tab-content pt-2">
                            <section class="section">
                                <div class="row align-items-top">
                                    @foreach ($file as $item)
                                        <div class="col-lg-3">
                                            <!-- Card with titles, buttons, and links -->
                                            <div class="card h-100">
                                                <img style="border-bottom: 2px solid black"
                                                    src="{{ asset('/storage/' . $item->thumbnail) }}" class="card-img-top"
                                                    alt="{{ $item->judul }}">
                                                <div class="card-body d-flex flex-column">
                                                    <div class="mt-auto">
                                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            {{ $item->kategoriFile->nama_kategori_file }}</h6>
                                                        <p class="card-text mb-4">{{ $item->deskripsi }}</p>
                                                        <div class="row">
                                                            <div class="col-6 p-1">
                                                                <a href="{{ route('tambahfile.edit', $item) }}"
                                                                    class="btn btn-primary w-100">Edit</a>
                                                            </div>
                                                            <div class="col-6 p-1">
                                                                <button type="button" class="btn btn-danger w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#confirmDeletefile{{ $item->id }}">Delete</button>

                                                                <!-- Modal delete file -->
                                                                @if (isset($item))
                                                                    <div class="modal fade"
                                                                        id="confirmDeletefile{{ $item->id }}"
                                                                        tabindex="-1"
                                                                        aria-labelledby="confirmDeleteModal{{ $item->id }}Label"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="confirmDeleteModal{{ $item->id }}Label">
                                                                                        Konfirmasi Hapus File</h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Apakah Anda yakin ingin menghapus File
                                                                                    ini?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <form id="deleteForm"
                                                                                        action="{{ route('tambahfile.destroy', $item->id) }}"
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
@endsection
