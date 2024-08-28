@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">kategori Anda</li>
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
                                    <a href="{{ route('kategori.index') }}" type="button"
                                        class="mt-2 btn btn-warning">Back</a>
                                </div>
                            </div>
                            <!-- General Form Elements -->
                            <form action="{{ route('kategori.update', $data) }}" method="POST"
                                enctype="multipart/form-data" class="mt-2">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kategori" value="{{ $data->nama_kategori }}"
                                            class="form-control">
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
