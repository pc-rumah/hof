<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>HEHE</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link id="favicon" href="{{ asset('landing-page/assets/img/favicon1.png') }}" rel="icon" type="image/x-icon">
    <link href="{{ asset('landing-page/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

    <!-- =======================================================
  * Template Name: PhotoFolio
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .gallery .gallery-item {
            width: 100%;
            height: 350px;
            /* Set a fixed height for uniformity */
            overflow: hidden;
            position: relative;
            background-color: #000;
            /* Optional: background color for fallback */
        }


        .gallery .gallery-item img {
            width: 100%;
            height: 120%;
            object-fit: cover;
            /* Ensures the image covers the entire container without distortion */
            position: absolute;
            top: 0;
            left: 0;
        }

        .gallery .swiper-container {
            padding-bottom: 20px;
            /* Adjust padding as needed */
        }

        .gallery .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery .gallery-links {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: none;
        }

        .gallery .gallery-item:hover .gallery-links {
            display: flex;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <i class="bi bi-camera"></i>
                <h1 class="sitename">PhotoFolio</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">Home<br></a></li>
                    <li><a href="/about">About</a></li>
                    <li class="dropdown"><a href="gallery.html"><span>Gallery</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="gallery.html">Nature</a></li>
                            <li><a href="gallery.html">People</a></li>
                            <li><a href="gallery.html">Architecture</a></li>
                            <li><a href="gallery.html">Animals</a></li>
                            <li><a href="gallery.html">Sports</a></li>
                            <li><a href="gallery.html">Travel</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
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

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="100">
                        <h2><span>Post your</span><span class="underlight">Random</span> Content<span>
                                Right Here</span></h2>
                        <p>Blanditiis praesentium aliquam illum tempore incidunt debitis dolorem magni est deserunt sed
                            qui libero. Qui voluptas amet.</p>
                        <a href="/kontak" class="btn-get-started">Available for
                            Hire<br></a>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($foto as $item)
                            <div class="swiper-slide">
                                <div class="gallery-item">
                                    <img src="{{ asset('/storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                        class="card-img-top">
                                    <div class="gallery-links d-flex align-items-center justify-content-center">
                                        <a href="{{ asset('/storage/' . $item->foto) }}" title="{{ $item->judul }}"
                                            class="glightbox preview-link"><i
                                                class="bi bi-arrows-angle-expand"></i></a>
                                        <a href="{{ route('detailfoto', ['id' => $item->id]) }}"
                                            class="details-link">
                                            <i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /Gallery Section -->


        <!-- Vidio Section -->
        <section id="gallery" class="gallery section">
            <h1 style="text-align: center">Vidio</h1>
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($vidio as $item)
                            <div class="swiper-slide">
                                <div class="gallery-item">
                                    <img src="{{ asset('/storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}"
                                        class="img-fluid">
                                    <div class="gallery-links d-flex align-items-center justify-content-center mt-2">
                                        <a href="{{ asset('/storage/' . $item->video) }}"
                                            title="{{ $item->judul }}" class="glightbox preview-link">
                                            <i class="bi bi-arrows-angle-expand"></i>
                                        </a>
                                        <a href="{{ route('detailvidio', ['id' => $item->id]) }}"
                                            class="details-link">
                                            <i class="bi bi-link-45deg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights
                        Reserved</span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

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


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4, // Sesuaikan jumlah slide yang ingin ditampilkan
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            mousewheel: {
                invert: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                960: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            }
        });
    </script>

    <script>
        // Function to set random favicon
        function setRandomFavicon() {
            const totalFavicons = 38; // Jumlah total favicon yang tersedia
            const randomIndex = Math.floor(Math.random() * totalFavicons) +
                1; // Memilih angka acak antara 1 dan totalFavicons
            const randomFavicon =
                `{{ asset('landing-page/assets/img/favicon') }}${randomIndex}.png`; // Menghasilkan URL favicon
            const faviconElement = document.getElementById('favicon');

            // Tambahkan query string untuk menghindari cache
            faviconElement.href = randomFavicon + '?v=' + Math.random();
        }

        document.addEventListener('DOMContentLoaded', function() {
            setRandomFavicon();
        });


        // Call the function when the page loads
        window.onload = setRandomFavicon;
    </script>
</body>

</html>
