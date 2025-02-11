@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tambahfile.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit File</li>
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
                                <div class="col-lg-10">
                                    <a href="{{ route('tambahfile.index') }}" type="button"
                                        class="mt-2 btn btn-warning">Back</a>
                                </div>
                            </div>
                            <!-- General Form Elements -->
                            <form action="{{ route('updatefile', $file) }}" method="POST" enctype="multipart/form-data"
                                class="mt-2">
                                @csrf
                                @method('patch')
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="judul" value="{{ $file->judul }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="kategori" aria-label="Default select example">
                                            <option value="{{ $file->kategori_id }}" selected>
                                                {{ $file->kategorifile->nama_kategori_file }}</option>
                                            </option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_kategori_file }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="thumbnail" type="file" id="formFile">
                                        @if (isset($file))
                                            <img src="{{ asset('/storage/' . $file->thumbnail) }}" alt="{{ $file->judul }}"
                                                class="img-thumbnail mt-2" style="width: 150px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="file" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="deskripsi" style="height: 100px">{{ $file->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
