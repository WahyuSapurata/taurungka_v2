@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Kontak</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Hubungi Kami Di Sini</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- =============================== Contact Page section start =============================== -->
    <section class="py-140">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="">
                            <h1 class="splitTextStyleOne cursor-big tw-mb-4">Kontak Kami</h1>
                        </div>
                        <div class="xs-grid-cols-2 d-grid tw-mt-16 tw-gap-74-px">
                            <div class="d-flex align-items-start tw-gap-6">
                                <span class="tw-text-3xl text-main-600 d-flex cursor-small">
                                    <i class="ph-bold ph-map-pin"></i>
                                </span>
                                <div class="">
                                    <h6 class="tw-mb-4 cursor-big">Location</h6>
                                    <p class="text-neutral-1000 cursor-small">Unit GA.9 No. 9-11 Gedung Mall Graha Tata
                                        Cemerlang (Mall GTC) di Jalan Metro Tanjung Bunga, Kota Makassar</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start tw-gap-6">
                                <span class="tw-text-3xl text-main-600 d-flex cursor-small">
                                    <i class="ph-bold ph-phone"></i>
                                </span>
                                <div class="">
                                    <h6 class="tw-mb-4 cursor-big">Phone</h6>
                                    <a href="tel:+62 823-9340-8606"
                                        class="text-neutral-1000 hover-text-main-600 cursor-big">+62 823-9340-8606</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start tw-gap-6">
                                <span class="tw-text-3xl text-main-600 d-flex cursor-small">
                                    <i class="ph-bold ph-envelope-simple"></i>
                                </span>
                                <div class="">
                                    <h6 class="tw-mb-4 cursor-big">Email</h6>
                                    <a href="mailto:dispora@makassarkota.go.id"
                                        class="text-neutral-1000 hover-text-main-600 cursor-big">dispora@makassarkota.go.id</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start tw-gap-6">
                                <span class="tw-text-3xl text-main-600 d-flex cursor-small">
                                    <i class="ph-bold ph-share-network"></i>
                                </span>
                                <div class="">
                                    <h6 class="tw-mb-4 cursor-big">Social</h6>
                                    <ul
                                        class="cursor-small d-flex align-items-center tw-gap-3 justify-content-center tw-mt-6">
                                        <li>
                                            <a href="https://www.facebook.com"
                                                class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-white hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph ph-facebook-logo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com"
                                                class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-white hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph ph-x-logo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com"
                                                class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-white hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph ph-instagram-logo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com"
                                                class="tw-w-11 tw-h-11 border border-neutral-200 rounded-circle text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-white hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph ph-youtube-logo"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-neutral-50 py-60 tw-px-54-px">
                        <h3 class="tw-mb-4 cursor-big">Isi Formulir</h3>
                        <p class="text-neutral-1000 cursor-small max-w-444-px">Alamat email Anda tidak akan dipublikasikan.
                            Bidang yang wajib diisi ditandai *</p>
                        <form action="#" class="tw-mt-70-px d-flex flex-column tw-gap-64-px">
                            <div class="position-relative">
                                <input type="text"
                                    class="cursor-small focus-outline-0 bg-transparent border-0 tw-pb-5 tw-ps-9 w-100 border-bottom border-neutral-200 focus-border-main-600"
                                    placeholder="Masukkan Nama Lengkap*" required>
                                <span class="tw-text-xl d-flex text-main-two-600 position-absolute top-0 tw-start-0">
                                    <i class="ph-bold ph-user"></i>
                                </span>
                            </div>
                            <div class="position-relative">
                                <input type="email"
                                    class="cursor-small focus-outline-0 bg-transparent border-0 tw-pb-5 tw-ps-9 w-100 border-bottom border-neutral-200 focus-border-main-600"
                                    placeholder="Email Anda*" required>
                                <span class="tw-text-xl d-flex text-main-two-600 position-absolute top-0 tw-start-0">
                                    <i class="ph-bold ph-envelope"></i>
                                </span>
                            </div>
                            <div class="position-relative">
                                <input type="email"
                                    class="cursor-small focus-outline-0 bg-transparent border-0 tw-pb-5 tw-ps-9 w-100 border-bottom border-neutral-200 focus-border-main-600"
                                    placeholder="Subyek*" required>
                                <span class="tw-text-xl d-flex text-main-two-600 position-absolute top-0 tw-start-0">
                                    <i class="ph-bold ph-bookmarks"></i>
                                </span>
                            </div>
                            <div class="position-relative">
                                <textarea
                                    class="cursor-small focus-outline-0 bg-transparent border-0 tw-pb-5 tw-ps-9 w-100 border-bottom border-neutral-200 focus-border-main-600 tw-h-108-px"
                                    placeholder="Masukkan aduan, kritik, saran anda..."></textarea>
                                <span class="tw-text-xl d-flex text-main-two-600 position-absolute top-0 tw-start-0">
                                    <i class="ph-bold ph-note-pencil"></i>
                                </span>
                            </div>
                            <div class="">
                                <button type="submit"
                                    class="cursor-small btn btn-main hover-style-one button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2 rounded-0"
                                    data-block="button">
                                    <span class="button__flair"></span>
                                    <span
                                        class="text-white tw-text-2xl group-hover-text-white tw-duration-500 position-relative">
                                        <i class="ph-bold ph-paper-plane-tilt"></i>
                                    </span>
                                    <span class="button__label">Get In Touch</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================== Contact Page section End =============================== -->
@endsection
