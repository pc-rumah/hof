@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <h1>Selamat Datang <span>{{ auth()->user()->name }}</span></h1>
        </section>

        <div class="">
            <a href="/" type="button" class="btn btn-primary">Kembali ke Landing Page</a>
        </div>
    </main>
@endsection
