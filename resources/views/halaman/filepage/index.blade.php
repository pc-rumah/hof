@extends('includes.filepage')

@section('content')
    <!-- konten -->
    <div>
        <div class="container flex-1 mx-auto px-4 py-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($file as $item)
                    <div id="cardfile" class="card card-compact bg-gradient-to-r from-indigo-300 to-pink-300 shadow-xl">
                        <figure>
                            <img class="rounded-xl object-contain object-center"
                                src="{{ asset('/storage/' . $item->thumbnail) }}" alt="Gambar File" />
                        </figure>
                        <div class="card-body">
                            <h5 class="text-sm text-zinc-900"></h5>
                            <h2 class="card-title text-black">
                                {{ $item->judul }}
                            </h2>
                            <div class="card-actions justify-center">
                                <a href="{{ route('detailfile', ['id' => $item->id]) }}"
                                    class="btn btn-primary text-neutral-300 font-semibold">Detail</a>
                                <a href="{{ url('/download/' . $item->id) }}"
                                    class="btn btn-success text-neutral-300">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- konten -->
@endsection
