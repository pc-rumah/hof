@extends('layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cards</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/pengguna">Home</a></li>
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
                            <div class="col-lg-2">
                                <h3>Halaman Kategori</h3>
                            </div>
                            <div class="col-lg-10">
                                <a href="{{ route('kategori.create') }}" type="button" class="btn btn-primary">Tambah
                                    Kategori</a>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
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
                                                    <a href="{{ route('kategori.edit', $item) }}"
                                                        class="btn btn-primary w-25">Edit
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('kategori.destroy', $item) }}"
                                                        class="btn btn-danger w-25">Edit
                                                    </a>
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
