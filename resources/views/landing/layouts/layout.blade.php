<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="  Transport & Logistics HTML Template">
    <meta name="keywords" content="  Transport & Logistics HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title> {{ config('app.name') . ' | ' . $module }} </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('pemkot.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap.min.css') }}">
    <!-- Stoshi font -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/satoshi.css') }}">
    <!-- swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/swiper-bundle.min.css') }}">
    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/aos.css') }}">
    <!-- Circle Progress -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/animated-radial-progress.css') }}">
    <!-- magnific -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/magnific-popup.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(255 255 255 / 94%);
            /* Ubah opacity latar belakang */
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            /* Tambahkan efek bayangan */
        }

        #loader .spinner {
            width: 200px;
            /* Sesuaikan lebar spinner sesuai kebutuhan */
            transform-origin: center;
            /* Agar rotasi terjadi di tengah */
            animation: shake 0.5s infinite alternate;
            /* Tambahkan animasi shake */
        }

        @keyframes shake {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        .custom-loader {
            width: 50px;
            height: 24px;
            background:
                radial-gradient(circle closest-side, #c93e10 90%, #0000) 0% 50%,
                radial-gradient(circle closest-side, #e44545 90%, #0000) 50% 50%,
                radial-gradient(circle closest-side, #c93e10 90%, #0000) 100% 50%;
            background-size: calc(100%/3) 12px;
            background-repeat: no-repeat;
            animation: d3 1s infinite linear;
        }

        @keyframes d3 {
            20% {
                background-position: 0% 0%, 50% 50%, 100% 50%
            }

            40% {
                background-position: 0% 100%, 50% 0%, 100% 50%
            }

            60% {
                background-position: 0% 50%, 50% 100%, 100% 0%
            }

            80% {
                background-position: 0% 50%, 50% 50%, 100% 100%
            }
        }
    </style>
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div id="loader">
        <img class="spinner" loading="lazy" src="{{ asset('preloader.png') }}" alt="Spinner">
        <div class="custom-loader"></div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap cursor-big">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    {{-- <!-- Custom Cursor Start -->
    <div class="cursor"></div>
    <span class="dot"></span>
    <!-- Custom Cursor End --> --}}

    @include('landing.layouts.sidebar')

    @include('landing.layouts.header')

    @yield('content')

    @include('landing.layouts.footer')

    <!-- Jquery js -->
    <script src="{{ asset('assets-landing/js/jquery-3.7.1.min.js') }}"></script>

    <!-- phosphor Js -->
    <script src="{{ asset('assets-landing/js/phosphor-icon.js') }}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('assets-landing/js/boostrap.bundle.min.js') }}"></script>
    <!-- swiper slider Js -->
    <script src="{{ asset('assets-landing/js/swiper-bundle.min.js') }}"></script>
    <!-- Split Text -->
    <script src="{{ asset('assets-landing/js/SplitText.min.js') }}"></script>
    <!-- Scroll Trigger -->
    <script src="{{ asset('assets-landing/js/ScrollTrigger.min.js') }}"></script>
    <!-- Gsap js -->
    <script src="{{ asset('assets-landing/js/gsap.min.js') }}"></script>
    <!-- custom gsap -->
    <script src="{{ asset('assets-landing/js/custom-gsap.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('assets-landing/js/aos.js') }}"></script>
    <!-- Circle Progress bar -->
    <script src="{{ asset('assets-landing/js/animated-radial-progress.js') }}"></script>
    <!-- counter up -->
    <script src="{{ asset('assets-landing/js/counterup.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets-landing/js/magnific-popup.min.js') }}"></script>
    <!-- marquee -->
    <script src="{{ asset('assets-landing/js/jquery.marquee.min.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets-landing/js/main.js') }}"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.onreadystatechange = function() {
            if (document.readyState === "complete") {
                // Ketika semua proses load tampilan selesai, sembunyikan loader
                document.getElementById('loader').style.display = 'none';
            }
        };
    </script>

    @yield('script')



</body>

</html>
