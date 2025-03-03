<!-- ============================ Header Top Start ==================================== -->
<div class="bg-neutral-50 position-relative z-1 d-sm-block d-none header-top-bg">
    <div class="container tw-container-1554-px">
        <div class="d-flex align-items-center justify-content-between tw-gap-6">

            <div class="d-flex align-items-center tw-gap-6">
                <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                    <span class="text-main-600 d-flex"><i class="ph-bold ph-map-pin"></i></span>
                    <span class="text-black xl-tw-text-sm tw-text-xs fw-medium">Jalan Metro Tanjung Bunga, Kota
                        Makassar</span>
                </div>
                <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                    <span class="text-main-600 d-flex"><i class="ph-bold ph-phone"></i></span>
                    <a href="mailto:support@example.com"
                        class="text-black xl-tw-text-sm tw-text-xs fw-medium hover--translate-x-05 hover-text-main-600 tw-transition-all">+62
                        823-9340-8606</a>
                </div>
            </div>
            <div class="d-md-flex d-none align-items-center tw-gap-6">
                <div class="cursor-small d-flex align-items-center tw-gap-2 tw-py-205">
                    <span class="text-main-600 d-flex"><i class="ph-bold ph-envelope"></i></span>
                    <a href="mailto:contact@gmail.com"
                        class="text-black xl-tw-text-sm tw-text-xs fw-medium hover--translate-x-05 hover-text-main-600 tw-transition-all">dispora@makassarkota.go.id</a>
                </div>
                <div
                    class="cursor-small d-lg-flex d-none align-items-center tw-py-205 tw-gap-6 tw-ps-10 clip-path position-relative">
                    <span class="text-white d-flex"><i class="ph-bold ph-map-trifold"></i></span>
                    <span class="text-white xl-tw-text-sm tw-text-xs fw-medium">Dispora Makassar
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================ Header Top End ==================================== -->

<!-- ==================== Header Start Here ==================== -->
<header class="header bg-white transition-all">
    <div class="tw-container-1742-px pe-lg-0 pe-3 tw-ms-auto">
        <nav class="header-inner tw-ps-4 bg-white d-flex justify-content-between">

            <div class="d-flex align-items-center ">
                <!-- Logo Start -->
                <style>
                    .logo-mask-bg {
                        width: 220px
                    }

                    .logo-mask-bg::before {
                        border-bottom-right-radius: 80px;
                        background: linear-gradient(161deg, #ee742b, #f3ad2e);
                    }

                    .logo-desktop {
                        border-bottom-right-radius: 80px;
                        background: linear-gradient(161deg, #ee742b, #f3ad2e);
                        padding: 6px;
                        width: 245px;
                    }

                    .logo-mobile {
                        border-bottom-right-radius: 80px;
                        background: linear-gradient(161deg, #ee742b, #f3ad2e);
                        padding: 6px;
                        width: 175px;
                    }

                    .active a {
                        color: hsl(358, 86%, 47%);
                    }
                </style>
                <div
                    class="cursor-big position-relative d-lg-flex d-none z-1 d-flex justify-content-center align-items-center">
                    <a href="index.html" class="logo-desktop">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="max-w-200-px">
                    </a>
                </div>
                <div class="position-relative d-lg-none d-inline-block z-1">
                    <a href="index.html" class="cursor-big logo-mobile">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="max-w-130-px">
                    </a>
                </div>
                <!-- Logo End  -->

                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none ps-108-px">
                    <!-- Nav menu Start -->
                    <ul class="nav-menu cursor-small d-lg-flex align-items-center xl-tw-gap-10 tw-gap-6">
                        <li class="nav-menu__item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}"
                                class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100">Home</a>
                        </li>
                        <li class="nav-menu__item {{ Request::is('event') ? 'active' : '' }}">
                            <a href="{{ route('event') }}"
                                class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100">
                                Event</a>
                        </li>
                        <li class="nav-menu__item {{ Request::is('statistik') ? 'active' : '' }}">
                            <a href="{{ route('statistik') }}"
                                class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100">Statistik
                            </a>
                        </li>
                        <li class="nav-menu__item {{ Request::is('kontak') ? 'active' : '' }}">
                            <a href="{{ route('kontak') }}"
                                class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100">Kontak</a>
                        </li>
                        <li class="nav-menu__item {{ Request::is('tentang') ? 'active' : '' }}">
                            <a href="{{ route('tentang') }}"
                                class="nav-menu__link hover--translate-y-1 text-main-two-600 tw-py-9 fw-medium w-100">Tentang</a>
                        </li>
                    </ul>
                    <!-- Nav menu End  -->

                </div>
                <!-- Menu End  -->
            </div>

            <!-- Header Right start -->
            <div class="d-flex gap-xxl-5 gap-3">
                <div class="d-flex align-items-center xl-tw-gap-7 tw-gap-6 flex-shrink-0">

                    <!-- Line Start -->
                    <span class="line h-100"></span>
                    <!-- Line End -->

                    @if (auth()->check())
                        @php
                            $fotoPath = asset('public/register/' . auth()->user()->foto);
                        @endphp

                        <div class="rounded-circle overflow-hidden d-none d-lg-flex" style="width: 95px; height: 95px;">
                            <img src="{{ $fotoPath }}" alt="Foto Profil" class="w-100 h-100 object-fit-cover">
                        </div>

                        <div class="rounded-circle overflow-hidden d-lg-none d-flex" style="width: 55px; height: 55px;">
                            <img src="{{ $fotoPath }}" alt="Foto Profil" class="w-100 h-100 object-fit-cover">
                        </div>
                    @else
                        <div class="d-flex tw-gap-11 flex-wrap d-lg-block d-none">
                            <a href="{{ route('login.login-akun') }}"
                                class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                data-block="button">
                                <span class="button__flair"></span>
                                <span class="button__label">Daftar/Masuk</span>
                                <span
                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                    <i class="ph-bold ph-check"></i>
                                </span>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Social icons Start -->
                <ul class=" d-lg-grid d-none grid-cols-2 bg-main-two-600 h-100 tw-w-200-px">
                    <li class="border-bottom border-neutral-1100 border-end">
                        <a href="https://www.twitter.com"
                            class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                            <i class="ph-fill ph-twitter-logo"></i>
                        </a>
                    </li>
                    <li class="border-bottom border-neutral-1100">
                        <a href="https://www.facebook.com"
                            class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                            <i class="ph-fill ph-facebook-logo"></i>
                        </a>
                    </li>
                    <li class="border-end border-neutral-1100">
                        <a href="https://www.instagram.com"
                            class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                            <i class="ph-bold ph-instagram-logo"></i>
                        </a>
                    </li>
                    <li class="">
                        <a href="https://www.youtube.com"
                            class="hover-scale-20 cursor-small text-white tw-text-base w-100 h-100 d-flex justify-content-center align-items-center">
                            <i class="ph-fill ph-youtube-logo"></i>
                        </a>
                    </li>
                </ul>
                <!-- Social icons End -->

                <button type="button" class="toggle-mobileMenu leading-none d-lg-none text-main-two-600 tw-text-9">
                    <i class="ph ph-list"></i>
                </button>
            </div>

            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
