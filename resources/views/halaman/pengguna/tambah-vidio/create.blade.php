@extends('layouts.index')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Tambah Vidio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('tambahvidio.index') }}" type="button" class="mt-2 btn btn-warning">Back</a>
                        <!-- General Form Elements -->
                        <form id="uploadvidio" action="{{ route('tambahvidio.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Durasi</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text">Menit</span>
                                        <input type="number" name="durasi_menit" min="0" class="form-control">

                                        <span class="input-group-text">Detik</span>
                                        <input type="number" name="durasi_detik" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="thumbnail" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Vidio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="vidio" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                    <button type="button" id="cancelUploadVidio" class="btn btn-danger">Cancel
                                        Upload</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div class="progress">
                                        <div id="progressBarVidio" class="progress-bar" role="progressbar"
                                            style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            0%</div>

                                    </div>
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
