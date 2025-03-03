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
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div
        class="preloader bg-white tw-h-screen justify-content-center align-items-center tw-z-999 position-fixed top-0 tw-start-0 w-100 h-100">
        <div class="car-road">
            <div class="car">
                <div class="car-top">
                    <div class="window">
                    </div>
                </div>
                <div class="car-base">
                </div>
                <div class="wheel-left wheel">
                    <div class="wheel-spike">
                    </div>
                    <div class="wheel-center">
                    </div>
                </div>
                <div class="wheel-right wheel">
                    <div class="wheel-spike">
                    </div>
                    <div class="wheel-center">
                    </div>
                </div>
                <div class="head-light"></div>
            </div>
            <div class="road">
            </div>
        </div>
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

    @yield('script')



</body>

</html>
