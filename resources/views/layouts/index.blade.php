<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('dashboard/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('dashboard/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        /* Ensure the entire page is at least 100% height */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Container that holds the entire content, including the footer */
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Main content should take up all available space */
        .content {
            flex: 1;
        }

        /* Footer stays at the bottom */
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }

        .hehe {
            transition: transform .2s
        }

        .hehe:hover {
            opacity: 0.7;
            transform: scale(1.1);
        }

        /* CSS untuk menyembunyikan tombol secara default */
        .gallery-item .btn {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* CSS untuk menampilkan tombol saat di-hover */
        .gallery-item:hover .btn {
            opacity: 1;
            transform: scale(1.1);
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        @media (max-width: 991.98px) {
            .card-img-top {
                height: auto;
            }
        }

        @media (max-width: 576px) {
            .btn.w-50 {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        {{-- navbar --}}
        @include('includes.header')
        {{-- end navbar --}}

        {{-- sidebar --}}
        @include('includes.sidebar')
        {{-- end sidebar --}}

        @yield('content')

        @include('includes.footer')

    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
    <script>
        setTimeout(() => {
            $('.alert').fadeOut()
        }, 5000);
    </script>

    <script>
        function setVideoSource(sourceUrl) {
            var videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.src = sourceUrl;
        }
        if (document.getElementById('videoModal')) {
            document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
                var videoPlayer = document.getElementById('videoPlayer');
                videoPlayer.pause(); // Hentikan video
                videoPlayer.currentTime = 0; // Setel ulang video ke awal
            });
        }
    </script>

    {{-- progress foto --}}
    <script>
        let xhrFoto;

        if (document.getElementById('uploadFotoForm')) {
            document.getElementById('uploadFotoForm').addEventListener('submit', function(event) {
                event.preventDefault();

                let form = event.target;
                let formData = new FormData(form);
                xhrFoto = new XMLHttpRequest();

                xhrFoto.open('POST', form.action, true);

                xhrFoto.upload.addEventListener('progress', function(event) {
                    if (event.lengthComputable) {
                        let percentComplete = (event.loaded / event.total) * 100;
                        let progressBar = document.getElementById('progressBarFoto');
                        if (progressBar) {
                            progressBar.style.width = percentComplete + '%';
                            progressBar.setAttribute('aria-valuenow', percentComplete);
                            progressBar.innerText = Math.floor(percentComplete) + '%';
                        }
                    }
                });

                xhrFoto.addEventListener('load', function() {
                    if (xhrFoto.status === 200) {
                        window.location.href = '{{ route('tambahfoto.index') }}?success=' +
                            encodeURIComponent('Foto berhasil ditambahkan');
                    } else {
                        window.location.href = '{{ route('tambahfoto.index') }}?error=' +
                            encodeURIComponent('Upload Foto Gagal!');
                    }
                });

                xhrFoto.send(formData);
            });

            if (document.getElementById('cancelUploadFoto')) {
                document.getElementById('cancelUploadFoto').addEventListener('click', function() {
                    if (xhrFoto) {
                        xhrFoto.abort();
                        let progressBar = document.getElementById('progressBarFoto');
                        if (progressBar) {
                            progressBar.style.width = '0%';
                            progressBar.setAttribute('aria-valuenow', 0);
                            progressBar.innerText = 'Upload Canceled';
                        }
                        alert('Upload foto dibatalkan.');
                    }
                });
            }
        }
    </script>
    {{-- progress foto --}}

    {{-- progress vidio --}}
    <script>
        let xhrVidio;

        if (document.getElementById('uploadvidio')) {
            document.getElementById('uploadvidio').addEventListener('submit', function(event) {
                event.preventDefault();

                let form = event.target;
                let formData = new FormData(form);
                xhrVidio = new XMLHttpRequest();

                xhrVidio.open('POST', form.action, true);

                xhrVidio.upload.addEventListener('progress', function(event) {
                    if (event.lengthComputable) {
                        let percentComplete = (event.loaded / event.total) * 100;
                        let progressBar = document.getElementById('progressBarVidio');
                        if (progressBar) {
                            progressBar.style.width = percentComplete + '%';
                            progressBar.setAttribute('aria-valuenow', percentComplete);
                            progressBar.innerText = Math.floor(percentComplete) + '%';
                        }
                    }
                });

                xhrVidio.addEventListener('load', function() {
                    if (xhrVidio.status === 200) {
                        window.location.href = '{{ route('tambahvidio.index') }}?success=' +
                            encodeURIComponent('Vidio berhasil ditambahkan');
                    } else {
                        window.location.href = '{{ route('tambahvidio.index') }}?error=' +
                            encodeURIComponent('Upload Vidio gagal!');
                    }
                });

                xhrVidio.send(formData);
            });

            if (document.getElementById('cancelUploadVidio')) {
                document.getElementById('cancelUploadVidio').addEventListener('click', function() {
                    if (xhrVidio) {
                        xhrVidio.abort();
                        let progressBar = document.getElementById('progressBarVidio');
                        if (progressBar) {
                            progressBar.style.width = '0%';
                            progressBar.setAttribute('aria-valuenow', 0);
                            progressBar.innerText = 'Upload Canceled';
                        }
                        alert('Upload vidio dibatalkan.');
                    }
                });
            }
        }
    </script>
    {{-- progress vidio --}}

    {{-- progress file --}}
    <script>
        let xhr; // Define xhr globally to be accessible in the cancel function

        if (document.getElementById('uploadFileForm')) {
            document.getElementById('uploadFileForm').addEventListener('submit', function(event) {
                event.preventDefault();

                let form = event.target;
                let formData = new FormData(form);
                xhr = new XMLHttpRequest();

                xhr.open('POST', form.action, true);

                // Event untuk progress bar
                xhr.upload.addEventListener('progress', function(event) {
                    if (event.lengthComputable) {
                        let percentComplete = (event.loaded / event.total) * 100;
                        let progressBar = document.getElementById('progressBar');
                        progressBar.style.width = percentComplete + '%';
                        progressBar.setAttribute('aria-valuenow', percentComplete);
                        progressBar.innerText = Math.floor(percentComplete) + '%';
                    }
                });

                // Event saat request selesai
                xhr.addEventListener('load', function() {
                    if (xhr.status === 200) {
                        window.location.href = '{{ route('tambahfile.index') }}?success=' +
                            encodeURIComponent(
                                'File berhasil ditambahkan');
                    } else {
                        window.location.href = '{{ route('tambahfile.index') }}?error=' +
                            encodeURIComponent(
                                'Upload File Gagal!');
                    }
                });

                xhr.send(formData);
            });
        }

        // Tombol Cancel
        if (document.getElementById('cancelUploadFile')) {
            document.getElementById('cancelUploadFile').addEventListener('click', function() {
                if (xhr) {
                    xhr.abort(); // Cancel the upload
                    let progressBar = document.getElementById('progressBar');
                    progressBar.style.width = '0%';
                    progressBar.setAttribute('aria-valuenow', 0);
                    progressBar.innerText = 'Upload Canceled';
                    alert('Upload dibatalkan.');
                }
            });
        }
    </script>
    {{-- progress file --}}
</body>

</html>
