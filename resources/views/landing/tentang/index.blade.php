@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Tentang
                    Kami</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">- Profil Tim Inovasi Taurungka -</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- ================================== About Section Start ======================================= -->
    <section class="about py-140 position-relative max-lg-overflow-hidden">
        <img src="assets/images/shapes/about-plane.png" alt=""
            class="cursor-big about-plane position-absolute tw-start-0 top-50">
        <img src="assets/images/thumbs/truck-head.png" alt=""
            class="truck-head cursor-big position-absolute tw-end-0 d-xxl-block d-none">

        <div class="container">
            <div class="row gy-5 flex-wrap-reverse">
                <div class="col-12">
                    <div class="">
                        <h1 class="splitTextStyleOne cursor-big tw-mb-8">Profil Tim Inovasi Taurungka</h1>
                        <p class="cursor-small text-neutral-900 tw-ps-205 border-start border-main-600 border-2">Taurungka
                            (Satu Data Pemuda) mengusung konsep People/Process/Technology Framework pada Satu Data Pemuda.
                            Kerangka kerja ini berkaitan erat satu dengan yang lain sehingga dapat bersinergi dan membentuk
                            Satu Data Pemuda sebagai ekosistem big data kepemudaan Kota Makassar

                            Dalam pengolahan data kepemudaan yang lebih komprehensif maka dibutuhkan tenaga manusia yang
                            kompeten di bidang tersebut guna mendapatkan pengetahuan yang dalam tentang kondisi faktual
                            pemuda saat ini dan yang akan datang. Untuk itu, Dispora Kota Makassar membentuk tim inovasi
                            yakni​:</p>

                        <span class="tw-my-7 border-bottom border-neutral-100 d-block"></span>

                        <ul class="cursor-small d-flex flex-column tw-gap-2">
                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">Developer Independen (Pihak ke-3) bertanggung
                                    jawab membangun website database kepemudaan Taurungka.</span>
                            </li>

                            <li class="d-flex flex-column tw-gap-2" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="400">
                                <div class="d-flex align-items-center tw-gap-4">
                                    <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                    <span class="text-neutral-1000 fw-medium">Tim Tenaga Ahli IT Dispora bertanggung jawab
                                        membangun melakukan pemrosesan data dan membuat dashboard web visualisasi data yang
                                        terdiri dari:</span>
                                </div>
                                <ul class="cursor-small d-flex flex-column tw-gap-2 ms-5">
                                    <li data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
                                        <div class="d-flex align-items-center tw-gap-2">
                                            <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                            <span class="text-neutral-1000 fw-medium">Data Analyst
                                                bertugas melakukan pemrosesan, analisa, dan interpretasi data;</span>
                                        </div>
                                    </li>
                                    <li data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                                        <div class="d-flex align-items-center tw-gap-2">
                                            <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                            <span class="text-neutral-1000 fw-medium">IT Programmer
                                                bertugas menganalisis kebutuhan infrastruktur, merancang arsitektur
                                                aplikasi,
                                                dan
                                                membangun aplikasi</span>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="600">
                                <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                <span class="text-neutral-1000 fw-medium">Mitra Strategis sebagai bagian dari proses
                                    komunikasi, informasi, dan edukasi terhadap Data Center Kepemudaan. Adapun, mitra
                                    strategis meliputi: Lembaga Non Profit, Media, Akademisi dan Peneliti.</span>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <a href="{{ asset('dokumen.pdf') }}" target="_blank"
                                class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                data-block="button">
                                <span class="button__flair"></span>
                                <span class="button__label">Dokumen Tambahan</span>
                                <span
                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                    <i class="ph-bold ph-file-doc"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================== About Section End ======================================= -->
@endsection
