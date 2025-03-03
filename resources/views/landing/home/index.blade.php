@extends('landing.layouts.layout')
@section('content')
    <!-- ============================ Banner section start ======================================= -->
    <section class="banner position-relative overflow-hidden">
        <img src="assets-landing/images/shapes/plane-small.png" alt=""
            class="planeSmall cursor-big position-absolute top-0 tw-start-0 tw-mt-134-px z-2 d-xxl-block d-none">
        <img src="assets-landing/images/shapes/triangle-shape.png" alt=""
            class="position-absolute bottom-0 tw-start-0 z-2 d-lg-block d-none">

        <div class="banner-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('background.png') }}" alt=""
                        class="scale-bg position-absolute top-0 tw-start-0 z-n1 w-100 h-100 object-fit-cover">
                    <div class="banner-item z-2 position-relative" style="padding-top: 185px">
                        <div class="tw-container-1540-px mx-auto tw-px-4">
                            <div class="position-relative">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <span
                                                class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Selamat
                                                Datang Di</span>
                                            <img class="splitTextStyleOne" src="{{ asset('logo_satu_pemuda_putih.png') }}"
                                                alt="">

                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="cursor-big bg-blur-one tw-rounded-lg max-w-520-px px-xxl-5 px-lg-4 px-3 py-lg-5 py-4 tw-ms-auto tw-mt-3">
                                    <span
                                        class="triangle-shape tw-w-10 tw-h-10 bg-main-600 position-absolute tw-start-0 bottom-0"></span>
                                    <p class="text-white tw-text-lg line-clamp-3">Website Aplikasi Big Data Kepemudaan Dinas
                                        Pemuda dan Olahraga Kota Makassar
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container w-0">
                <div class="position-relative w-0">
                    <div class="pagination-style-one text-start swiper-pagination banner-pagination cursor-big"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Banner section End ======================================= -->

    <!-- ======================================== Section Features section start ===================================== -->
    <section class="features bg-neutral-50 bg-img" data-background-image="assets-landing/images/shapes/features-bg.png">
        <div class="row g-0 features-item-wrapper justify-content-center">
            @foreach ($data_makassar as $index => $item)
                <div class="col-lg-3 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="{{ $loop->iteration * 100 }}">

                    <div class="features-item animation-item p-80-px tw-duration-300 position-relative h-100">
                        <span
                            class="fw-bold tw-text-xl text-main-two-600 position-absolute top-0 tw-end-0 tw-mt-12 tw-me-12 font-heading cursor-small">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="pb-50-px cursor-big animate__wobble">
                            <img src="{{ asset('public/icon/' . ($item->icon ?? 'default.png')) }}" width="150px"
                                alt="">
                        </span>
                        <h5 class="tw-mb-3 cursor-big splitTextStyleTwo">
                            {{ number_format($item->nilai ?? 0, 0, ',', '.') }} {{ $item->satuan ?? '' }}
                        </h5>
                        <p class="text-neutral-1000 cursor-small">
                            {{ $item->nama ?? 'Tidak ada nama' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ======================================== Section Features section End ===================================== -->

    <!-- ================================== About Section Start ======================================= -->
    {{-- <section class="about py-140 position-relative max-lg-overflow-hidden">
        <img src="assets-landing/images/shapes/about-plane.png" alt=""
            class="cursor-big about-plane position-absolute tw-start-0 top-50">
        <img src="assets-landing/images/thumbs/truck-head.png" alt=""
            class="truck-head cursor-big position-absolute tw-end-0 d-xxl-block d-none">

        <div class="container">
            <div class="row gy-5 flex-wrap-reverse">
                <div class="col-lg-5 pe-xl-5">
                    <div class="position-relative tw-pb-11 h-100">
                        <div class="position-relative" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="assets-landing/images/thumbs/about-img.png" alt=""
                                class="w-100 h-100 object-fit-cover">
                            <span
                                class="cursor-big tw-w-75-px tw-h-75-px bg-main-600 d-flex justify-content-center align-items-center rounded-circle position-absolute tw-end-0 bottom-0 tw-me-305 tw-mb-305 d-lg-flex d-none">
                                <img src="assets-landing/images/icons/play-bar.svg" alt="">
                            </span>
                        </div>

                        <div class="positioned-image bg-white cursor-big common-shadow-four rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-start-0 tw-p-9"
                            data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="assets-landing/images/thumbs/glob-track.png" alt="">
                        </div>

                        <div class="tw-p-10 tw-pe-130-px tw--translate-x-30-px bg-main-600 position-absolute tw-start-0 bottom-0 tw--ms-30-px"
                            data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <h1 class="text-white tw-mb-4 cursor-big">25+</h1>
                            <div class="d-flex flex-column tw-gap-1 align-items-start">
                                <span class="text-white fw-medium cursor-small">Years Of Experience</span>
                                <img src="assets-landing/images/shapes/line-shape.png" alt="">
                            </div>
                            <div
                                class="cursor-small before-border position-relative tw-p-205 bg-white d-inline-flex align-items-start tw-gap-1 position-absolute top-0 tw-end-0 tw-mt-205 tw-me-205 z-1">
                                <span class="tw-text-xl fw-semibold text-main-600">4.9</span>
                                <span class="tw-text-xl fw-semibold text-main-600 d-flex tw--translate-y-4-px"><i
                                        class="ph-fill ph-star"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <div class="">
                        <span
                            class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                            Transportation & Logistics</span>
                        <h1 class="splitTextStyleOne cursor-big tw-mb-8">Modern transport system & secure packaging
                        </h1>
                        <p class="cursor-small text-neutral-900 tw-ps-205 border-start border-main-600 border-2">
                            Temperate ocean-bass sea chub unicorn fish treefish eulachon tidewater goby. Flier, bighe
                            carp Devario shortnose sucker platy smalleye</p>

                        <div class="tw-mt-9">
                            <div class="row gy-4">
                                <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="animation-item d-flex align-items-center tw-gap-6">
                                        <span class="cursor-big animate__heartBeat">
                                            <img src="assets-landing/images/icons/about-icon1.svg" alt="">
                                        </span>
                                        <h6 class="cursor-big">Air Freight <br> Transportation</h6>
                                    </div>
                                    <p class="cursor-small text-neutral-1000 tw-mt-605 line-clamp-2">Temperate
                                        ocean-bass sea chub bass sea chub treefish eulachon tidewater goby.</p>
                                </div>
                                <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                    <div class="animation-item d-flex align-items-center tw-gap-6">
                                        <span class="cursor-big animate__heartBeat">
                                            <img src="assets-landing/images/icons/about-icon2.svg" alt="">
                                        </span>
                                        <h6 class="cursor-big">Ocean Freight
                                            Transportation</h6>
                                    </div>
                                    <p class="cursor-small text-neutral-1000 tw-mt-605 line-clamp-2">Temperate
                                        ocean-bass sea chub bass sea chub
                                        treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>

                        <span class="tw-my-7 border-bottom border-neutral-100 d-block"></span>

                        <ul class="cursor-small d-flex flex-column tw-gap-2">
                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">We approached WiaTech with complex project
                                    deliver</span>
                            </li>
                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">Awards Winning IT Solutions Company</span>
                            </li>
                        </ul>

                        <div class="d-flex align-items-center tw-gap-56-px tw-mt-10 flex-wrap">
                            <a href="service.html"
                                class="cursor-small btn btn-main-two hover-style-three button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group rounded-0"
                                data-block="button" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <span class="button__flair"></span>
                                <span class="button__label">View services</span>
                                <span
                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative tw-duration-500">
                                    <i class="ph-bold ph-check"></i>
                                </span>
                            </a>

                            <div class="d-flex align-items-center tw-gap-205" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span
                                    class="tw-w-15 tw-h-15 rounded-circle tw-p-2 bg-white common-shadow-three flex-shrink-0">
                                    <img src="assets-landing/images/thumbs/user-img.png" alt="">
                                </span>
                                <div class="d-flex flex-column tw-gap-1 cursor-small">
                                    <img src="assets-landing/images/thumbs/signature.png" alt="">
                                    <span class="fw-semibold tw-text-sm text-main-600">Ceo & Founder</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ================================== About Section End ======================================= -->

    <!-- ============================== service Section Start ================================= -->
    {{-- <section class="service pb-140 position-relative half-bg-white bg-neutral">
        <img src="assets-landing/images/shapes/pattern-bg.png" alt=""
            class="position-absolute bottom-0 tw-start-0 w-100 h-50">

        <div class="container">
            <div class="max-w-856-px mx-auto text-center tw-pb-16 tw-mb-6">
                <span
                    class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                    Transportation & Logistics</span>
                <h1 class="splitTextStyleOne cursor-big">Fastest & Secured Logistics Solution & services</h1>
            </div>
        </div>
        <div class="tw-container-1540-px mx-auto tw-px-4">
            <div class="bg-main-two-600 tw-rounded-2xl position-relative z-1">
                <img src="assets-landing/images/thumbs/service-bg-img.png" alt=""
                    class="position-absolute tw-end-0 bottom-0 z-n1">

                <div class="container">
                    <div class="row gy-4 align-items-end">
                        <div class="col-xl-5" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <div class="pt-120">
                                <div class="bg-neutral-50 px-lg-5 tw-px-6 tw-pt-76-px tw-pb-15 rectangle-shape">
                                    <ul class="common-tab nav nav-pills d-flex flex-column tw-gap-8" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100 active"
                                                id="pills-air-transportation-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-air-transportation" type="button" role="tab"
                                                aria-controls="pills-air-transportation" aria-selected="true">
                                                <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                    <img src="assets-landing/images/icons/service-icon1.svg"
                                                        alt="" class="d-sm-flex d-none animate__swing">
                                                    <span>Air Transportation</span>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100"
                                                id="pills-traini-transport-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-traini-transport" type="button" role="tab"
                                                aria-controls="pills-traini-transport" aria-selected="false">
                                                <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                    <img src="assets-landing/images/icons/service-icon5.svg"
                                                        alt="" class="d-sm-flex d-none animate__swing">
                                                    <span>Train Transportation</span>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100"
                                                id="pills-cargoShipFrieght-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-cargoShipFrieght" type="button" role="tab"
                                                aria-controls="pills-cargoShipFrieght" aria-selected="false">
                                                <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                    <img src="assets-landing/images/icons/service-icon3.svg"
                                                        alt="" class="d-sm-flex d-none animate__swing">
                                                    <span>Cargo Ship Frieght</span>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100"
                                                id="pills-Maritime-transportation-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-Maritime-transportation" type="button"
                                                role="tab" aria-controls="pills-Maritime-transportation"
                                                aria-selected="false">
                                                <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                    <img src="assets-landing/images/icons/service-icon4.svg"
                                                        alt="" class="d-sm-flex d-none animate__swing">
                                                    <span>Maritime Transportation</span>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link cursor-big tw-text-xl animation-item text-main-two-600 hover-text-main-600 active-scale-094 tw-duration-300 fw-semibold tw-px-8 tw-py-4 tw-rounded-lg bg-white w-100"
                                                id="pills-flightTrans-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-flightTrans" type="button" role="tab"
                                                aria-controls="pills-flightTrans" aria-selected="false">
                                                <span class="d-flex align-items-center gap-xxl-5 tw-gap-6 text-start">
                                                    <img src="assets-landing/images/icons/service-icon5.svg"
                                                        alt="" class="d-sm-flex d-none animate__swing">
                                                    <span>Flight Transportation</span>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 ps-xl-5">
                            <div class="tab-content py-120" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-air-transportation" role="tabpanel"
                                    aria-labelledby="pills-air-transportation-tab" tabindex="0">
                                    <div class="">
                                        <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">For each
                                            project we establish relationships with partners who we know will help us
                                            create added value for</p>
                                        <div class="d-flex align-items-center position-relative max-w-620-px"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                            <span
                                                class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                <img src="assets-landing/images/icons/service-icon5.svg" alt="">
                                            </span>
                                            <div class="tw--me-32-px d-sm-flex d-none position-relative">
                                                <img src="assets-landing/images/thumbs/service-img.png" alt="">
                                            </div>
                                            <div
                                                class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Fast Delivery</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Safety</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Good Package</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Privacy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="200">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Dedicated Transport wise</span>
                                            </li>
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="400">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Domestics & Logistics</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-traini-transport" role="tabpanel"
                                    aria-labelledby="pills-traini-transport-tab" tabindex="0">
                                    <div class="">
                                        <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">For each
                                            project we establish relationships with partners who we know will help us
                                            create added value for</p>
                                        <div class="d-flex align-items-center position-relative max-w-620-px"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                            <span
                                                class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                <img src="assets-landing/images/icons/service-icon5.svg" alt="">
                                            </span>
                                            <div class="tw--me-32-px position-relative">
                                                <img src="assets-landing/images/thumbs/service-img.png" alt="">
                                            </div>
                                            <div
                                                class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Fast Delivery</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Safety</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Good Package</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Privacy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="200">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Dedicated Transport wise</span>
                                            </li>
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="400">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Domestics & Logistics</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-cargoShipFrieght" role="tabpanel"
                                    aria-labelledby="pills-cargoShipFrieght-tab" tabindex="0">
                                    <div class="">
                                        <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">For each
                                            project we establish relationships with partners who we know will help us
                                            create added value for</p>
                                        <div class="d-flex align-items-center position-relative max-w-620-px"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                            <span
                                                class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                <img src="assets-landing/images/icons/service-icon5.svg" alt="">
                                            </span>
                                            <div class="tw--me-32-px position-relative">
                                                <img src="assets-landing/images/thumbs/service-img.png" alt="">
                                            </div>
                                            <div
                                                class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Fast Delivery</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Safety</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Good Package</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Privacy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="200">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Dedicated Transport wise</span>
                                            </li>
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="400">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Domestics & Logistics</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Maritime-transportation" role="tabpanel"
                                    aria-labelledby="pills-Maritime-transportation-tab" tabindex="0">
                                    <div class="">
                                        <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">For each
                                            project we establish relationships with partners who we know will help us
                                            create added value for</p>
                                        <div class="d-flex align-items-center position-relative max-w-620-px"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                            <span
                                                class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                <img src="assets-landing/images/icons/service-icon5.svg" alt="">
                                            </span>
                                            <div class="tw--me-32-px position-relative">
                                                <img src="assets-landing/images/thumbs/service-img.png" alt="">
                                            </div>
                                            <div
                                                class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Fast Delivery</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Safety</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Good Package</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Privacy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="200">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Dedicated Transport wise</span>
                                            </li>
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="400">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Domestics & Logistics</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-flightTrans" role="tabpanel"
                                    aria-labelledby="pills-flightTrans-tab" tabindex="0">
                                    <div class="">
                                        <p class="bg-main-two-900 tw-py-8 tw-pe-8 tw-ps-14 tw-text-lg text-white fw-semibold border-start border-main-600 border-5 tw-mb-11 cursor-small"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">For each
                                            project we establish relationships with partners who we know will help us
                                            create added value for</p>
                                        <div class="d-flex align-items-center position-relative max-w-620-px"
                                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                            <span
                                                class="tw-w-90-px tw-h-90-px bg-white rounded-circle d-flex justify-content-center align-items-center position-absolute top-50 tw--translate-y-50 z-2 tw-start-48">
                                                <img src="assets-landing/images/icons/service-icon5.svg" alt="">
                                            </span>
                                            <div class="tw--me-32-px position-relative">
                                                <img src="assets-landing/images/thumbs/service-img.png" alt="">
                                            </div>
                                            <div
                                                class="bg-main-600 tw-h-280-px d-flex justify-content-center align-items-center tw-pe-6 tw-ps-8 position-relative z-1 rectangle-shape-two max-w-286-px w-100">
                                                <ul class="cursor-small d-flex flex-column tw-gap-2">
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Fast Delivery</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Safety</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Good Package</span>
                                                    </li>
                                                    <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate"
                                                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                                        <span class="text-white d-flex"><i
                                                                class="ph-bold ph-check"></i></span>
                                                        <span class="text-white fw-medium">Privacy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="cursor-small d-flex flex-row flex-wrap tw-gap-8 tw-mt-14">
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="200">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Dedicated Transport wise</span>
                                            </li>
                                            <li class="d-flex align-items-center tw-gap-4 aos-init" data-aos="fade-up"
                                                data-aos-duration="1000" data-aos-delay="400">
                                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                                <span class="text-white fw-medium">Domestics & Logistics</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ============================== service Section End ================================= -->


    <!-- ================================= Counter Section Start ==================================== -->
    {{-- <section class="counter d-lg-flex">

        <div class="w-100 lg-w-50 position-relative">
            <img src="assets-landing/images/shapes/counter-shape.png" alt=""
                class="position-absolute top-0 tw-start-0">
            <img src="assets-landing/images/thumbs/counter-img.png" alt="" class="w-100 h-100 object-fit-cover">
            <div class="bg-main-two-600 tw-p-10 position-absolute tw-start-0 bottom-0 tw-end-0 z-1">
                <div class="row gy-4">
                    <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="d-flex align-items-center tw-gap-8">
                            <div>
                                <svg class="radial-progress cursor-big" data-percentage="90" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage bg-white" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">
                                        90%
                                    </text>
                                </svg>
                            </div>
                            <div class="">
                                <h6 class="tw-text-xl text-white tw-mb-4 cursor-big">Container Delivery</h6>
                                <p class="text-white line-clamp-2 max-w-210-px cursor-small">End to end fiber optic
                                    cable nnectivity for stable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="d-flex align-items-center tw-gap-8">
                            <div>
                                <svg class="radial-progress cursor-big" data-percentage="70" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage bg-white" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">
                                        70%
                                    </text>
                                </svg>
                            </div>
                            <div class="">
                                <h6 class="tw-text-xl text-white tw-mb-4 cursor-big">Good Packaging</h6>
                                <p class="text-white line-clamp-2 max-w-210-px cursor-small">End to end fiber optic
                                    cable nnectivity for stable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 tw-ps-110-px lg-w-50 bg-img py-120 position-relative z-1 h-auto d-flex flex-column justify-content-center overflow-hidden"
            data-background-image="assets-landing/images/shapes/counter-bg.png">
            <img src="assets-landing/images/thumbs/counter-bg-img.png" alt=""
                class="counter-bg-img position-absolute bottom-0 tw-end-0 z-n1">
            <img src="assets-landing/images/thumbs/biman-blue.png" alt=""
                class="blue-biman position-absolute top-0 tw-end-0 z-n1">

            <div class="max-w-632-px">
                <div class="">
                    <span
                        class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                        Transportation & Logistics</span>
                    <h1 class="splitTextStyleOne cursor-big tw-mb-8">We Provide Full Assistance in Freight &
                        Warehousing</h1>
                    <p class="cursor-small text-neutral-900">Temperate ocean-bass sea chub unicorn fish treefish
                        eulachon tidewater. Flier, bighe carp Devario shortnose sucker platy smalleye </p>
                </div>
                <div class="tw-mt-10 d-flex flex-wrap tw-gap-5">
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <h2 class="cursor-big counter font-body text-white tw-mb-2">35+</h2>
                        <p class="cursor-small text-white tw-text-lg">Countries Represented</p>
                    </div>
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-two-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h2 class="cursor-big counter font-body text-white tw-mb-2">853+</h2>
                        <p class="cursor-small text-white tw-text-lg">Projects completed</p>
                    </div>
                    <div class="text-center flex-grow-1 max-w-190-px w-100 bg-main-three-600 tw-rounded-lg tw-px-8 tw-py-10"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <h2 class="cursor-big counter font-body text-main-two-600 tw-mb-2">35+</h2>
                        <p class="cursor-small text-main-two-600 tw-text-lg">Total Revuneue</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ================================= Counter Section End ==================================== -->

    <!-- ============================== Key Features section Start ================================== -->
    {{-- <section class="key-features py-140 position-relative">
        <img src="assets-landing/images/thumbs/ship.png" alt=""
            class="curve-animation position-absolute top-0 tw-mt-16 tw-end-0 tw-me-14">
        <img src="assets-landing/images/shapes/key-features-dotted.png" alt=""
            class="position-absolute bottom-0 tw-end-0">

        <div class="position-relative z-1">
            <img src="assets-landing/images/shapes/key-features-shape.png" alt=""
                class="position-absolute bottom-0 tw-start-0 w-100 z-n1">

            <div class="container">
                <div class="max-w-840-px mx-auto text-center tw-mb-15">
                    <span
                        class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                        Transportation & Logistics</span>
                    <h1 class="splitTextStyleOne cursor-big tw-mb-8">Why we are considered the best in business</h1>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-6">
                        <div class="d-flex flex-column tw-gap-56-px">
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon1.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Decentralized Trade</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="300">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon2.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Direct Transport</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon3.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Good Packaging</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none">
                        <div
                            class="bg-neutral-50 tw-py-8 tw-px-3 border tw-border-dashed border-neutral-200 tw-rounded-3xl position-relative h-100">
                            <img src="assets-landing/images/thumbs/kay-features-img.png" alt=""
                                data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">

                            <div
                                class="bg-blur-two tw-py-10 px-lg-5 tw-px-6 position-absolute bottom-0 tw-start-50 translate-50-rotate-10 tw-rounded-32-px min-w-max tw-mb-14">
                                <h1 class="cursor-big">Since <span class="text-main-600">1998</span> </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 ps-xxl-5">
                        <div class="d-flex flex-column tw-gap-56-px">
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon4.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Highly Flexible</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon5.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Secure Delivery</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                            <div class="animation-item" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="600">
                                <span class="tw-mb-6 cursor-small animate__flipInY">
                                    <img src="assets-landing/images/icons/key-features-icon6.svg" alt="">
                                </span>
                                <h5 class="splitTextStyleTwo tw-mb-5 cursor-big">Air Freight Facility</h5>
                                <p class="text-neutral-1000 cursor-small fw-medium">Temperate ocean-bass sea chub
                                    treefish eulachon tidewater goby.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ============================== Key Features section End ================================== -->

    <!-- =============================== Transport Way Section Start ================================ -->
    {{-- <section class="py-140 bg-img position-relative overflow-hidden"
        data-background-image="assets-landing/images/shapes/how-it-work-bg.png">
        <img src="assets-landing/images/shapes/plane-down.png" alt=""
            class="plan-down position-absolute tw-start-0 top-0">
        <img src="assets-landing/images/shapes/biman-line.png" alt=""
            class="cursor-small d-lg-block d-none position-absolute tw-end-0 top-50 tw--translate-y-50 tw-me-15">

        <div class="container">
            <div class="max-w-840-px mx-auto text-center tw-mb-15">
                <span
                    class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                    Transportation & Logistics</span>
                <h1 class="splitTextStyleOne cursor-big tw-mb-8">Introducing The most Modern way of Transportation
                </h1>
            </div>

            <div class="how-it-work-item-wrapper">
                <div class="row gy-4">
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300">
                                        <img src="assets-landing/images/icons/tranport-way-icon1.svg" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <img src="assets-landing/images/shapes/curve-arrow-right.png" alt=""
                                        class="position-absolute top-0 tw-end-0 tw-me-15 animate__wobble__two z-1">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Replenishment and
                                        picking</h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea
                                        chub treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300 bg-main-two-600">
                                        <img src="assets-landing/images/icons/tranport-way-icon2.svg" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <img src="assets-landing/images/shapes/curve-arrow-right.png" alt=""
                                        class="position-absolute top-0 tw-end-0 tw-me-15 animate__wobble__two z-1">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Warehousing
                                        operation</h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea
                                        chub treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="transport-card position-relative">
                            <div class="how-it-work-item animation-item position-relative">
                                <div class="half-bg-white z-1 position-relative">
                                    <span
                                        class="how-it-work-item__icon cursor-big bg-main-600 tw-w-114-px tw-h-114-px d-flex justify-content-center align-items-center rounded-circle tw-ms-10 tw-duration-300">
                                        <img src="assets-landing/images/icons/tranport-way-icon3.svg" alt=""
                                            class="animate__heartBeat">
                                    </span>
                                </div>
                                <div class="bg-white tw-px-10 tw-py-15 tw-pt-8 position-relative">
                                    <h5 class="splitTextStyleTwo tw-mb-5 cursor-big max-w-200-px">Transportation
                                        Processing</h5>
                                    <p class="text-neutral-1000 cursor-small">Temperate ocean-bass sea chub bass sea
                                        chub treefish eulachon tidewater goby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- =============================== Transport Way Section End ================================ -->

    <!-- ========================== Contact us section start =============================== -->
    {{-- <section class="d-xl-flex">
        <div class="w-100 xl-w-50 position-relative">
            <div class="d-flex h-100">
                <img src="assets-landing/images/thumbs/contact-us-img1.png" alt="" class="d-sm-block d-none">
                <div class="text-center animation-item bg-main-two-600 tw-py-12 tw-px-6 flex-grow-1">
                    <span class="cursor-big">
                        <img src="assets-landing/images/icons/conact-us-icon1.svg" alt=""
                            class="animate__wobble">
                    </span>
                    <h2 class="splitTextStyleOne text-white tw-mb-8 tw-mt-6 cursor-big">Need Our Services?</h2>
                    <a href="#"
                        class="cursor-small fw-bold text-white d-inline-flex align-items-center tw-gap-5 hover-text-main-600">
                        Contact With us
                        <img src="assets-landing/images/icons/arrow-right.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="w-100 xl-w-50 position-relative">
            <div class="d-sm-flex">
                <div class="position-relative">
                    <img src="assets-landing/images/thumbs/contact-us-img2.png" alt=""
                        class="w-100 h-100 object-fit-cover">
                    <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg"
                        class="play-button circle-border bg-inherit-animation cursor-big tw-w-75-px tw-h-75-px d-flex justify-content-center align-items-center bg-main-three-600 text-main-two-600 hover-text-main-two-700 active-scale-094 rounded-circle tw-text-xl position-absolute top-50 tw-start-50 translate-middle">
                        <i class="ph-fill ph-play"></i>
                    </a>
                </div>
                <div class="text-center animation-item bg-main-600 tw-py-12 tw-px-6 flex-grow-1">
                    <span class="cursor-big">
                        <img src="assets-landing/images/icons/conact-us-icon2.svg" alt=""
                            class="animate__wobble">
                    </span>
                    <h2 class="splitTextStyleOne text-white tw-mb-8 tw-mt-6 cursor-big">Discuss With Agents</h2>
                    <a href="#"
                        class="cursor-small fw-bold text-white d-inline-flex align-items-center tw-gap-5 hover-text-main-two-600">
                        Contact With us
                        <img src="assets-landing/images/icons/arrow-right.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ========================== Contact us section End =============================== -->

    <!-- ================================= Projects section start ===================================== -->
    {{-- <section class="project half-bg-w-50 py-140 position-relative z-1 overflow-hidden">
        <img src="assets-landing/images/thumbs/projects-shape-img.png" alt=""
            class="project-shape-img position-absolute tw-start-0 top-0 z-n1">

        <div class="container">
            <div class="d-flex align-items-center flex-wrap tw-gap-6 justify-content-between tw-mb-15">
                <div class="max-w-632-px text-start">
                    <span
                        class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                        Transportation & Logistics</span>
                    <h1 class="splitTextStyleOne cursor-big tw-mb-8">Transport & Logistics projects that we have</h1>
                </div>
                <a href="service.html"
                    class="cursor-small btn btn-main-two hover-style-three button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2 rounded-0 tw-px-13 tw-py-505"
                    data-block="button">
                    <span class="button__flair"></span>
                    <span class="button__label">View services</span>
                </a>
            </div>
        </div>

        <div class="container">
            <div class="view-w-100 position-relative z-1">
                <div class="project-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="group-item">
                                <div class="position-relative hover-overlay">
                                    <img src="assets-landing/images/thumbs/project-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                    <a href="project-details.html"
                                        class="cursor-big tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 btn btn-main hover-style-one button--stroke tw-w-140-px tw-h-140-px d-flex justify-content-center align-items-center group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 rounded-circle tw-text-9 position-absolute tw-start-50 top-50 translate-middle"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label"><i class="ph ph-arrow-down-right"></i></span>
                                    </a>
                                </div>
                                <div class="tw-mt-8">
                                    <span class="text-neutral-1000 tw-mb-5 cursor-small">Domestic &
                                        Transportation</span>
                                    <h5 class="cursor-big">
                                        <a href="project-details.html"
                                            class="hover-text-main-600 line-clamp-2 splitTextStyleTwo">The latest
                                            delivery management industry tips trends & hot</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="group-item">
                                <div class="position-relative hover-overlay">
                                    <img src="assets-landing/images/thumbs/project-img2.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                    <a href="project-details.html"
                                        class="cursor-big tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 btn btn-main hover-style-one button--stroke tw-w-140-px tw-h-140-px d-flex justify-content-center align-items-center group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 rounded-circle tw-text-9 position-absolute tw-start-50 top-50 translate-middle"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label"><i class="ph ph-arrow-down-right"></i></span>
                                    </a>
                                </div>
                                <div class="tw-mt-8">
                                    <span class="text-neutral-1000 tw-mb-5 cursor-small">Domestic &
                                        Transportation</span>
                                    <h5 class="cursor-big">
                                        <a href="project-details.html"
                                            class="hover-text-main-600 line-clamp-2 splitTextStyleTwo">Taking a new
                                            pragmatic approach to flight capacity limitations</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                            <div class="group-item">
                                <div class="position-relative hover-overlay">
                                    <img src="assets-landing/images/thumbs/project-img3.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                    <a href="project-details.html"
                                        class="cursor-big tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 btn btn-main hover-style-one button--stroke tw-w-140-px tw-h-140-px d-flex justify-content-center align-items-center group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 rounded-circle tw-text-9 position-absolute tw-start-50 top-50 translate-middle"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label"><i class="ph ph-arrow-down-right"></i></span>
                                    </a>
                                </div>
                                <div class="tw-mt-8">
                                    <span class="text-neutral-1000 tw-mb-5 cursor-small">Domestic &
                                        Transportation</span>
                                    <h5 class="cursor-big">
                                        <a href="project-details.html"
                                            class="hover-text-main-600 line-clamp-2 splitTextStyleTwo">The latest
                                            delivery management industry tips trends & hot</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="group-item">
                                <div class="position-relative hover-overlay">
                                    <img src="assets-landing/images/thumbs/project-img4.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                    <a href="project-details.html"
                                        class="cursor-big tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 btn btn-main hover-style-one button--stroke tw-w-140-px tw-h-140-px d-flex justify-content-center align-items-center group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 rounded-circle tw-text-9 position-absolute tw-start-50 top-50 translate-middle"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label"><i class="ph ph-arrow-down-right"></i></span>
                                    </a>
                                </div>
                                <div class="tw-mt-8">
                                    <span class="text-neutral-1000 tw-mb-5 cursor-small">Domestic &
                                        Transportation</span>
                                    <h5 class="cursor-big">
                                        <a href="project-details.html"
                                            class="hover-text-main-600 line-clamp-2 splitTextStyleTwo">The latest
                                            delivery management industry tips trends & hot takes</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                            <div class="group-item">
                                <div class="position-relative hover-overlay">
                                    <img src="assets-landing/images/thumbs/project-img2.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                    <a href="project-details.html"
                                        class="cursor-big tw-invisible opacity-0 group-hover-item-visible group-hover-item-opacity-1 btn btn-main hover-style-one button--stroke tw-w-140-px tw-h-140-px d-flex justify-content-center align-items-center group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 rounded-circle tw-text-9 position-absolute tw-start-50 top-50 translate-middle"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label"><i class="ph ph-arrow-down-right"></i></span>
                                    </a>
                                </div>
                                <div class="tw-mt-8">
                                    <span class="text-neutral-1000 tw-mb-5 cursor-small">Domestic &
                                        Transportation</span>
                                    <h5 class="cursor-big">
                                        <a href="project-details.html"
                                            class="hover-text-main-600 line-clamp-2 splitTextStyleTwo">Taking a new
                                            pragmatic approach to flight capacity limitations</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ================================= Projects section end ===================================== -->

    <!-- ============================ Get in touch section start =============================== -->
    {{-- <section class="get-in-touch py-140 position-relative overflow-hidden">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="">
                        <span
                            class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                            Transportation & Logistics</span>
                        <h1 class="splitTextStyleOne cursor-big tw-mb-8">Get In Touch</h1>
                        <p class="cursor-small text-neutral-900 tw-ps-205 border-start border-main-600 border-3">
                            Temperate ocean-bass sea chub unicorn fish treefish eulachon Flier, bighe carp Devario
                            shortnose sucker platy smalleye</p>

                        <div class="tw-mt-10 tw-mb-13">
                            <span class="text-main-two-600 fw-bold cursor-small">24/7 Support center</span>
                            <h2 class="tw-mt-3 cursor-big">
                                <a href="tel:+1718-904-4450"
                                    class="text-main-600 hover--translate-y-1 tw-duration-200 font-body">+1
                                    718-904-4450</a>
                            </h2>
                        </div>

                        <div class="d-flex flex-sm-nowrap flex-wrap tw-gap-7">
                            <div class="bg-neutral-50 tw-rounded-lg tw-py-7 tw-px-6 max-w-280-px" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="100">
                                <h5 class="tw-mb-3 cursor-big">Headquater -</h5>
                                <p class="text-main-two-600 fw-medium cursor-small">4517 Washington Ave. Manchester,
                                    Kentucky 39495</p>
                            </div>
                            <div class="border border-main-two-600 tw-rounded-lg tw-py-7 tw-px-6 max-w-280-px"
                                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <h5 class="tw-mb-3 cursor-big">Email Us -</h5>
                                <p class="text-main-two-600 fw-medium cursor-small">4517 Washington Ave. Manchester,
                                    Kentucky 39495</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="location">
                        <div class="">
                            <img src="assets-landing/images/shapes/map-img.png" alt="">
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="location-item position-relative d-inline-block">
                            <span
                                class="location-item__point tw-w-3 tw-h-3 rounded-circle bg-main-600 cursor-pointer scalable-animation position-relative cursor-small hover-scale-30 tw-duration-500"></span>

                            <div
                                class="location-item__card bg-white tw-rounded-md tw-p-2 common-shadow-four d-inline-block max-w-148-px position-absolute bottom-100 tw-start-50 tw--translate-x-50 min-w-max tw-duration-300 z-2 invisible opacity-0">
                                <div class="tw-rounded-md overflow-hidden tw-max-h-88-px mx-auto">
                                    <img src="assets-landing/images/thumbs/map-img1.png" alt=""
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                                <div class="tw-px-2 tw-pt-5 tw-pb-3">
                                    <span class="fw-bold text-main-two-600 tw-text-sm max-w-130-px cursor-small">198
                                        West 21th Street, New York</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ============================ Get in touch section end =============================== -->

    <!-- ================================ Quate Section Start ========================== -->
    {{-- <section class="quate bg-img tw-mb-9 position-relative"
        data-background-image="assets-landing/images/shapes/quate-bg-img.png">
        <img src="assets-landing/images/thumbs/karen.png" alt=""
            class="updown-animation position-absolute bottom-0 tw-end-0">

        <div class="sgsdgsdg">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="py-120">
                        <div class="">
                            <span
                                class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                                Transportation & Logistics</span>
                            <h2 class="splitTextStyleOne cursor-big text-white tw-mb-8">Transport & Logistics Services
                                We are the best</h2>
                            <p class="cursor-small text-white">Transmds is the world's driving worldwide coordinations
                                supplier — we uphold industry and exchange the</p>
                        </div>
                        <ul class="cursor-small d-flex flex-column tw-gap-3 tw-mt-14">
                            <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-400 tw-text-lg">Preaching Worship An Online Family</span>
                            </li>
                            <li class="d-flex align-items-center tw-gap-4 aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="400">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-400 tw-text-lg">Preaching Worship An Online Family</span>
                            </li>
                        </ul>
                        <div class="tw-mt-15 d-flex align-items-center tw-gap-5">
                            <div class="tw-rounded-md overflow-hidden cursor-big" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <img src="assets-landing/images/thumbs/quate-img.png" alt=""
                                    class="w-100 h-100 object-fit-cover">
                            </div>
                            <p class="tw-text-lg text-white fw-bold max-w-310-px cursor-small" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="400">Leading global logistic and transport
                                agency since <span class="text-main-600">1990</span> </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                    <div
                        class="clip-path-short position-relative tw-translate-y-35-px bg-main-600 tw-py-15 px-lg-5 tw-px-56 tw-mt-16 max-w-468-px ms-auto">
                        <h4 class="text-white tw-mb-8 cursor-big">Request a quote form</h4>
                        <form action="#">
                            <div class="row gy-4">
                                <div class="col-sm-12">
                                    <label for="personalInfo"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Personal
                                        information</label>
                                    <input type="text"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="personalInfo" placeholder="Your Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Email</label>
                                    <input type="email"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="Email" placeholder="Email">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Phone"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Phone</label>
                                    <input type="text"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none"
                                        id="Phone" placeholder="Phone">
                                </div>
                                <div class="col-sm-12">
                                    <label for="deliveryInfo"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Delivery
                                        information</label>
                                    <select id="deliveryInfo"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Delivery City</option>
                                        <option value="">Dhaka</option>
                                        <option value="">Chandpur</option>
                                        <option value="">Sylhet</option>
                                        <option value="">Ranngpur</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="FreightType" class="cursor-small text-white tw-text-sm tw-mb-4">Freight
                                        Type</label>
                                    <select id="FreightType"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                        <option value="">Freight Type</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Incoterms"
                                        class="cursor-small text-white tw-text-sm tw-mb-4">Incoterms</label>
                                    <select id="Incoterms"
                                        class="cursor-big tw-px-5 tw-py-3 bg-white tw-placeholder-text-main-two-600 border-0 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none form-select">
                                        <option value="" selected hidden>Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                        <option value="">Incoterms</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-center tw-gap-6 flex-wrap tw-mt-4">
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox"
                                                value="" id="Fragile">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Fragile">Fragile</label>
                                        </div>
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox"
                                                value="" id="Expressdelivery">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Expressdelivery">Express delivery</label>
                                        </div>
                                        <div class="form-check common-check cursor-small d-flex tw-gap-205 mb-0">
                                            <input class="form-check-input border-white" type="checkbox"
                                                value="" id="Insurance">
                                            <label class="form-check-label text-white tw-text-sm fw-bold"
                                                for="Insurance">Insurance</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="cursor-small btn btn-main-two hover-style-two button--stroke d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2 rounded-0 tw-px-13 tw-py-505 w-100 tw-h-15 tw-mt-6"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label">Get A Quate</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ================================ Quate Section End ========================== -->

    <!-- ============================= Facility Section Start ================================ -->
    {{-- <section class="facility pt-140">
        <div class="container">
            <div class="tw-pb-12 border-bottom border-neutral-100">
                <div class="row gy-5">
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="assets-landing/images/icons/facility-icon1.svg" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">Get Compensation</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish
                                    eulachon.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="assets-landing/images/icons/facility-icon2.svg" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">No Spend Your Time</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish
                                    eulachon.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="d-flex flex-sm-row flex-column align-items-sm-center tw-gap-7 animation-item">
                            <span
                                class="cursor-big flex-shrink-0 tw-w-108-px tw-h-108-px bg-main-50 rounded-circle d-flex justify-content-center align-items-center">
                                <img src="assets-landing/images/icons/facility-icon3.svg" alt=""
                                    class="animate__bounce">
                            </span>
                            <div class="flex-grow-1">
                                <h5 class="tw-mb-4 cursor-big">Warehouse Facilities</h5>
                                <p class="text-neutral-1000 cursor-small">Temperate ocean-bass seachub treefish
                                    eulachon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ============================= Facility Section End ================================ -->

    <!-- ================================ Testimonials and brand section start =================================  -->
    {{-- <section class="testimonials-brand pb-140 tw-mt-9 position-relative z-1">
        <img src="assets-landing/images/shapes/testimonials-brand-bg.png" alt=""
            class="position-absolute bottom-0 tw-start-0 tw-end-0 z-n1 w-100 h-75">
        <img src="assets-landing/images/shapes/moon-shape.png" alt=""
            class="moon-shape position-absolute bottom-0 tw-start-0 z-n1 tw-mb-17">

        <!-- Testimonials start -->
        <div class="tw-container-1380-px tw-px-4 mx-auto">
            <div class="testimonials-box bg-white">

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide bg-white">
                            <div class="row gy-4">
                                <div class="col-md-4 xs-d-block d-none">
                                    <div class="position-relative max-w-318-px tw-me-11 tw-mt-11">
                                        <div class="mask-shape d-flex position-relative">
                                            <img src="assets-landing/images/thumbs/about-img.png"
                                                alt="Testimonials Image">
                                        </div>
                                        <span
                                            class="tw-w-90-px tw-h-90-px bg-main-600 rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-end-0 tw--me-45-px tw--mt-45-px cursor-big">
                                            <img src="assets-landing/images/icons/quate-icon.svg" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-xxl-5">
                                        <p class="xl-tw-text-3xl tw-text-xl fw-bold text-main-two-600 cursor-big">
                                            Climb the mountain not to plant your flag but to embrace the ways challenge,
                                            enjoy the air, and behold the. Climb it see the world, not so the world can
                                            see you. This is due to their excellent service competitive pricing</p>
                                        <span class="tw-my-10 border-bottom border-neutral-100 d-block"></span>

                                        <div class="d-flex align-items-center justify-content-between flex-wrap tw-gap-2">
                                            <div class="">
                                                <h5 class="tw-mb-2 cursor-big">Robert J. Hare</h5>
                                                <span class="text-neutral-900 cursor-small">Sr. Product Manager</span>
                                            </div>
                                            <ul class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white">
                            <div class="row gy-4">
                                <div class="col-md-4 xs-d-block d-none">
                                    <div class="position-relative max-w-318-px tw-me-11 tw-mt-11">
                                        <div class="mask-shape d-flex position-relative">
                                            <img src="assets-landing/images/thumbs/about-img.png"
                                                alt="Testimonials Image">
                                        </div>
                                        <span
                                            class="tw-w-90-px tw-h-90-px bg-main-600 rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 tw-end-0 tw--me-45-px tw--mt-45-px cursor-big">
                                            <img src="assets-landing/images/icons/quate-icon.svg" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-xxl-5">
                                        <p class="xl-tw-text-3xl tw-text-xl fw-bold text-main-two-600 cursor-big">
                                            Climb the mountain not to plant your flag but to embrace the ways challenge,
                                            enjoy the air, and behold the. Climb it see the world, not so the world can
                                            see you. This is due to their excellent service competitive pricing</p>
                                        <span class="tw-my-10 border-bottom border-neutral-100 d-block"></span>

                                        <div class="d-flex align-items-center justify-content-between flex-wrap tw-gap-2">
                                            <div class="">
                                                <h5 class="tw-mb-2 cursor-big">Robert J. Hare</h5>
                                                <span class="text-neutral-900 cursor-small">Sr. Product Manager</span>
                                            </div>
                                            <ul class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                                <li class="text-star tw-text-base"><i class="ph-fill ph-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Testimonials End -->


        <!-- Brand Start -->
        <div class="container">
            <div class="tw-mt-17">
                <div class="left-right-line text-center position-relative z-1">
                    <p class="d-inline-block tw-text-xl fw-bold text-main-two-600 tw-px-10 bg-bg-color cursor-small">
                        Trusted and funded by more then <span class="text-main-600">900</span> companies</p>
                </div>

                <div class="tw-mt-12">
                    <div class="brand-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img1.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img2.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="300">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img3.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img4.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img5.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                            <div class="swiper-slide me-0" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="500">
                                <div class="text-center cursor-big">
                                    <img src="assets-landing/images/thumbs/brand-img2.png" alt=""
                                        class="max-w-175-px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
    </section>
    <!-- ================================ Testimonials and brand section End =================================  --> --}}

    <!-- ================================== Blog section start =============================== -->
    {{-- <section class="blog py-140">
        <div class="container">
            <div class="max-w-632-px mx-auto text-center tw-mb-15">
                <span
                    class="splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305">Safe
                    Transportation & Logistics</span>
                <h2 class="splitTextStyleOne cursor-big tw-mb-8 h1">Read All Our Logistics News & Blogs</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="assets-landing/images/thumbs/blog-img1.png" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-600">
                                25 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-two-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i
                                            class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service
                                    Case Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="assets-landing/images/thumbs/blog-img2.png" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-two-600">
                                20 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i
                                            class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service
                                    Case Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <a href="blog-details.html" class="w-100 d-block">
                                <img src="assets-landing/images/thumbs/blog-img3.png" alt=""
                                    class="hover-scale-108 tw-duration-300 w-100 h-100 object-fit-cover">
                            </a>
                            <h5
                                class="blog-date cursor-big tw-duration-300 tw-py-4 text-white d-flex justify-content-center align-items-center max-w-82-px w-100 tw-px-4 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-600">
                                30 Dec
                            </h5>
                            <div
                                class="blog-tag tw-duration-300 tw-px-4 tw-py-205 text-white fw-semibold tw-text-xs d-flex align-items-center tw-gap-2 cursor-big position-absolute tw-start-0 bottom-0 bg-main-two-600">
                                <span class="d-flex"><i class="ph-fill ph-tag"></i></span>
                                Transport
                            </div>
                        </div>
                        <div class="tw-mt-505">
                            <div class="tw-mb-505 d-flex align-items-center tw-gap-6 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i class="ph-bold ph-user-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Mehedii .H</span>
                                </div>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg"><i
                                            class="ph-bold ph-chats-circle"></i></span>
                                    <span class="text-neutral-600 tw-text-sm">Comments (03)</span>
                                </div>
                            </div>
                            <h5 class="tw-mb-10">
                                <a href="blog-details.html"
                                    class="splitTextStyleTwo line-clamp-2 hover-text-main-600 cursor-big">IT Service
                                    Case Studies Accelerating Business Fly Success Tech</a>
                            </h5>
                            <a href="blog-details.html"
                                class="text-neutral-900 fw-semibold hover-text-main-600 cursor-small hover--translate-y-1 tw-duration-150 d-flex align-items-center tw-gap-2">
                                <span class=" text-decoration-underline">Read More</span>
                                <i class="ph-bold ph-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ================================== Blog section End =============================== -->
@endsection
