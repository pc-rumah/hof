@extends('layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cards</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="row">

                            <div class="col-lg-8">
                                <a href="{{ route('tambahkategori.create') }}" type="button" class="btn btn-primary">Tambah
                                    Kategori</a>
                            </div>

                            <div class="col-lg-4">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="card">
                            <div class="card-body">
                                <!-- Default Table -->
                                <table class="table table-info">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Kategori</th>
                                            <th scope="col">Aksi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->nama_kategori }}</td>
                                                <td>
                                                    <a href="{{ route('tambahkategori.edit', $item) }}"
                                                        class="btn btn-primary mb-2">Edit</a>
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#alert-hapus-kategori{{ $item->id }}">Delete</button>

                                                    <!-- Modal delete foto -->
                                                    @if (isset($item))
                                                        <div class="modal fade" id="alert-hapus-kategori{{ $item->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="confirmDeleteModal{{ $item->id }}Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmDeleteModal{{ $item->id }}Label">
                                                                            Konfirmasi Hapus Kategori</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus Kategori
                                                                        ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form id="deleteForm{{ $item->id }}"
                                                                            action="{{ route('tambahkategori.destroy', $item->id) }}"
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
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </main>
@endsection
