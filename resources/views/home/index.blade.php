<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Beranda - {{ $option->nama }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/home/assets/favicon.ico" />
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/5fd2369345.js" crossorigin="anonymous"></script>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/home/css/styles.css" rel="stylesheet" />
    <style>
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-top: 1px solid #e9ecef;
        }

        .footer .social-icons a {
            color: #6c757d;
            margin-right: 15px;
            font-size: 24px;
        }

        .footer .social-icons a:hover {
            color: #000;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <h2><a class="navbar-brand" href="/">{{ $option->nama }}</a></h2>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">{{ $option->judul }}</ </h1>
                                <p class="lead fw-normal text-white-50 mb-4">{{ $option->subjudul }}</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/login">Mulai Sekarang <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid  rounded-3 my-5"
                            src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                </div>
            </div>
        </header>
    </main>
    <footer class="footer mt-4">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-4 mb-3">
                    <img src="https://dummyimage.com/500x300/343a40/6c757d" alt="Logo" class="img-fluid mb-2">
                    <h5 class="d-inline">{{ $option->deskripsi }}</h5>
                </div>
                <!-- Social Media Links -->
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3">Media Sosial</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/BKNgoid/" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="http://www.twitter.com/bkngoid" target="_blank"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.youtube.com/bkngoidofficial" target="_blank"><i
                                class="bi bi-youtube"></i></a>
                        <a href="https://www.instagram.com/bkngoidofficial" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3">Kontak</h5>
                    <p><i class="bi bi-telephone"></i> {{ $option->notelp }}</p>
                    <p><i class="bi bi-envelope"></i> {{ $option->email }}</p>
                    <p><i class="bi bi-geo-alt"></i> {{ $option->alamat }}</p>
                </div>
            </div>
            <div class="text-center py-4 ">
                <p class="mb-0">&copy; {{ date('Y') }} <a href="/" rel="nofollow noopener"
                        class="text-decoration-none">{{ $option->nama }}</a></p>
            </div>
        </div>
    </footer>
    <!-- Footer-->
    {{-- <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer> --}}
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/home/js/scripts.js"></script>
</body>

</html>
