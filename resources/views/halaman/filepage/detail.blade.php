@extends('includes.filepage')


@section('content')
    <!-- konten -->
    <div class="container mx-auto px-4 py-2 ">
        <div class="flex justify-center">
            <div id="card" class="card lg:card-side bg-base-100 shadow-xl">
                <figure>
                    <img src="{{ asset('/storage/' . $file->thumbnail) }}" alt="{{ $file->judul }}" />
                </figure>
                <div id="card-body" class="card-body">
                    <h2 class="card-title">{{ $file->judul }}</h2>
                    <p><strong>Kategori:</strong> {{ $file->kategorifile->nama_kategori_file }}</p>
                    <p><strong>Uploader:</strong> {{ $file->user->name }}</p>
                    <p><strong>Deskripsi:</strong> {{ $file->deskripsi }}</p>
                    <p><strong>Ukuran:</strong> {{ number_format($file->size / 1048576, 2) }} MB</p>
                    <div class="card-actions justify-end">
                        <a class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- konten -->
@endsection
