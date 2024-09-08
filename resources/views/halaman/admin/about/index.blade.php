@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form About</h5>

                <!-- Floating Labels Form -->
                <form action="{{ route('editabout.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Foto Profile</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file" id="formFile">
                            @if (isset($about) && $about->image)
                                <img src="{{ asset('profile_images/' . $about->image) }}" alt="Profile Image"
                                    class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingEmail" name="title" placeholder="Title"
                                value="{{ old('title', $about->title ?? '') }}">
                            <label for="floatingEmail">Title</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingEmail" name="deskripsi"
                                placeholder="Deskripsi" value="{{ old('deskripsi', $about->description ?? '') }}">
                            <label for="floatingEmail">Deskripsi</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingPassword" name="notelp"
                                placeholder="Notelp" value="{{ old('notelp', $about->notelp ?? '') }}">
                            <label for="floatingPassword">Notelp</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" name="kota"
                                placeholder="Kota" value="{{ old('kota', $about->kota ?? '') }}">
                            <label for="floatingPassword">Kota</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ isset($about) ? 'Update' : 'Submit' }}</button>

                    </div>
                    {{-- pesan session --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
                <!-- End floating Labels Form -->
            </div>
        </div>
    </main>
@endsection
