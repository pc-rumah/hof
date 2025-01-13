@extends('layouts.index')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tambahfoto.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Foto</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 mt-2">
                                <h3>Halaman Edit</h3>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('tambahfoto.index') }}" type="button"
                                    class="mt-2 btn btn-warning">Back</a>
                            </div>
                            <div class="col-lg-4 mt-2">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- General Form Elements -->
                        <form action="{{ route('tambahfoto.update', $foto) }}" method="POST"
                            enctype="multipart/form-data" class="mt-2">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" value="{{ $foto->judul }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                        <option value="{{ $foto->kategori_id }}" selected>
                                            {{ $foto->kategori->nama_kategori }}</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="foto" type="file" id="formFile">
                                    @if (isset($foto))
                                        <img src="{{ asset('/storage/' . $foto->foto) }}" alt="{{ $foto->judul }}"
                                            class="img-thumbnail mt-2" style="width: 150px;">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" style="height: 100px">{{ $foto->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
