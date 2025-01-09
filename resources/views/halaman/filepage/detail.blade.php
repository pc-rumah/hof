<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Gallery Single</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('landing-page/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('landing-page/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing-page/assets/css/main.css') }}" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .gambarabout {
            border: 2px salmon solid;
            width: 70%;
            height: 70%;
        }

        @media (max-width: 995px) {
            .gambarabout {
                width: 50%;
                height: 80%;
            }
        }

        #cardfile {
            width: 100%;
            height: 80%;
        }

        @media (max-width: 1300px) {
            #cardfile {
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>

<body class="gallery-single-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center ">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <i class="bi bi-camera"></i>
                <h1 class="sitename">Hehe</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/">Home<br></a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/filesearch">File</a></li>
                    <li class="dropdown"><a href=""><span>Gallery</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($kategori as $item)
                                <li>
                                    <a
                                        href="{{ route('kategori.filter', $item->nama_kategori) }}">{{ $item->nama_kategori }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/kontak">Contact</a></li>
                    {{-- tombol dashboard dan login --}}
                    @if (Auth::check())
                        @if (Auth::user()->hasRole('admin'))
                            <li><a href="/admin">Dashboard</a></li>
                        @elseif (Auth::user()->hasRole('pengguna'))
                            <li><a href="/pengguna">Dashboard</a></li>
                        @endif
                    @else
                        <li><a href="/login">Login</a></li>
                    @endif
                    {{-- tombol dashboard dan login --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
    <!-- konten -->
    <div class=""
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
        <div class="container mx-auto px-4 py-2">
            <div class="flex justify-center items-center">
                <div class="w96 bg-gray-300 rounded-lg p-4 py-2 text-zinc-100 rounded-t-lg">
                    <!-- header -->
                    <div class="bg-blue-500 py-2 rounded-lg">
                        <h1 class="text-lg mx-4">Waktu Upload: {{ $file->created_at->format('d-m-y') }}</h1>
                    </div>
                    <!-- header -->

                    <!-- nama file -->
                    <div class="text-gray-800 text-2xl text-center font-bold mt-2 py-2">
                        {{ $file->judul }}
                    </div>
                    <!-- nama file -->

                    <!-- divider -->
                    <div class="border-t border-gray-500 "></div>
                    <!-- divider -->

                    <!-- nama file -->
                    <div class="text-center font-bold mt-2 py-2">
                        <h5 class="text-zinc-800">{{ $file->created_at->format('d-m-y') }}</h5>
                    </div>
                    <!-- nama file -->

                    <!-- gambar file -->
                    <div class="mt-4">
                        <img class="w-96 h-80" src="{{ asset('/storage/' . $file->thumbnail) }}"
                            alt="{{ $file->judul }}" srcset="">
                    </div>
                    <!-- gambar file -->

                    <div>
                        <!-- detail file -->
                        <div class="mt-4 text-gray-800 text-sm">
                            <p><Strong>Title:</Strong> {{ $file->judul }}</p>
                            <p><Strong>Kategori:</Strong> {{ $file->kategorifile->nama_kategori_file }}</p>
                            <p><Strong>Uploader:</Strong> {{ $file->user->name }}</p>
                            <p><Strong>Size:</Strong> {{ number_format($file->size / 1048576, 2) }} MB</p>
                        </div>
                        <!-- detail file -->

                        <!-- tombol download -->
                        <div class="mt4 flex justify-end">
                            <button class="bg-green-500 font-bold rounded-lg text-white py-2 px-4">Download</button>
                        </div>
                        <!-- tombol download -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- konten -->

    {{-- @include('includes.footerdetail') --}}
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing-page/assets/js/main.js') }}"></script>
</body>

</html>
