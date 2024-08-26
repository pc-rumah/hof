@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                {{-- bagian card profile --}}
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('/storage/' . $user->photo) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ auth()->user()->name }}</h2>
                            <div class="social-links mt-2">

                                <a href="{{ $user->facebook }}" target="_blank" class="facebook"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $user->instagram }}" target="_blank" class="instagram"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $user->linkedin }}" target="_blank" class="linkedin"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- bagian pesan session --}}
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
                    {{-- end bagian pesan session --}}
                </div>
                {{-- end bagian card profile --}}

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">{{ $user->tentang }}</p>
                                    <h5 class="card-title">Detail Profile</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nama</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->pekerjaan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Negara</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->negara }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Telp</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->notelp }}</div>
                                    </div>

                                </div>

                                {{-- bagian form edit --}}
                                @include('profile.editform.editprofile')
                                {{-- end form edit --}}

                                {{-- bagian form change password --}}
                                @include('profile.editform.changepass')
                                {{-- end form change password --}}
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
