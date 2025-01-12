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
                            <div class="col-lg-3">
                                <h3>Halaman Foto</h3>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('tambahfoto.create') }}" type="button" class="btn btn-primary">Tambah
                                    Foto</a>
                            </div>

                            <div class="col-lg-3">
                                @if (session('success') || request()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') ?? request()->get('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <hr class="hr">
                        <div class="tab-content pt-2">
                            <section class="section">
                                <div class="row align-items-top">
                                    @foreach ($data as $item)
                                        <div class="col-lg-3 mb-4 mb-md-0">
                                            <!-- Card with titles, buttons, and links -->
                                            <div class="card h-100">
                                                <img style="border-bottom: 2px solid black"
                                                    src="{{ asset('/storage/' . $item->foto) }}" class="card-img-top"
                                                    alt="{{ $item->judul }}">
                                                <div class="card-body d-flex flex-column">
                                                    <div class="mt-auto">
                                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            {{ $item->kategori->nama_kategori }}</h6>
                                                        <p class="card-text mb-4">{{ $item->deskripsi }}</p>
                                                        <div class="row">
                                                            <div class="col-6 p-1">
                                                                <a href="{{ route('tambahfoto.edit', $item) }}"
                                                                    class="btn btn-primary w-100">Edit</a>
                                                            </div>
                                                            <div class="col-6 p-1">
                                                                <button type="button" class="btn btn-danger w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#confirmDeletefoto{{ $item->id }}">Delete</button>

                                                                <!-- Modal delete foto -->
                                                                @if (isset($item))
                                                                    <div class="modal fade"
                                                                        id="confirmDeletefoto{{ $item->id }}"
                                                                        tabindex="-1"
                                                                        aria-labelledby="confirmDeleteModal{{ $item->id }}Label"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="confirmDeleteModal{{ $item->id }}Label">
                                                                                        Konfirmasi Hapus Foto</h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Apakah Anda yakin ingin menghapus foto
                                                                                    ini?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <form
                                                                                        id="deleteForm{{ $item->id }}"
                                                                                        action="{{ route('tambahfoto.destroy', $item->id) }}"
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
    </main><!-- End #main -->
@endsection
