@extends('layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Kontak</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Kontak</h5>

                <!-- Floating Labels Form -->
                <form action="{{ route('editkontak.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" name="alamat"
                                placeholder="Alamat">
                            <label for="floatingName">Alamat</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="notelp" class="form-control" id="floatingEmail" name="no_telp"
                                placeholder="No_Telp">
                            <label for="floatingEmail">No Telp</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingPassword" name="email"
                                placeholder="Email">
                            <label for="floatingPassword">Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" name="github"
                                placeholder="Email">
                            <label for="floatingTextarea">Github</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
        </div>
    </main>
@endsection
