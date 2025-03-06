<!-- ==================== Mobile Menu Start Here ==================== -->
<div
    class="mobile-menu d-lg-none d-block scroll-sm position-fixed bg-white tw-w-300-px tw-h-screen overflow-y-auto tw-p-6 tw-z-999 tw--translate-x-full tw-pb-68 ">

    <button type="button"
        class="close-button position-absolute tw-end-0 top-0 tw-me-2 tw-mt-2 tw-w-605 tw-h-605 rounded-circle d-flex justify-content-center align-items-center text-main-two-600 bg-neutral-200 hover-bg-main-two-600 hover-text-white">
        <i class="ph ph-x"></i>
    </button>

    <div class="mobile-menu__inner">
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

            .mobile-menu__logo {
                border-bottom-right-radius: 80px;
                background: linear-gradient(161deg, #ee742b, #f3ad2e);
                padding: 6px;
                width: 175px;
            }

            .active a {
                color: hsl(358, 86%, 47%);
            }
        </style>
        <a href="index.html" class="mobile-menu__logo">
            <img src="{{ asset('logo.png') }}" style="width: 145px" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <!-- Nav menu Start -->
            <ul class="nav-menu cursor-small d-lg-flex align-items-center nav-menu--mobile d-block tw-mt-8">
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
                <li class="nav-menu__item mt-3">
                    @if (auth()->check())
                        <div class="d-flex tw-gap-11 flex-wrap">
                            <a href="{{ route('logout') }}"
                                class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                data-block="button">
                                <span class="button__flair"></span>
                                <span class="button__label">Logout</span>
                                <span
                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                    <i class="ph-bold ph-sign-out"></i>
                                </span>
                            </a>
                        </div>
                    @else
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
                    @endif
                </li>
            </ul>
            <!-- Nav menu End  -->

        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->
