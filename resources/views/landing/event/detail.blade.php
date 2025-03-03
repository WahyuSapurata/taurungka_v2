@php
    use Carbon\Carbon;
    Carbon::setLocale('id');

    $formattedDate = Carbon::parse($event->created_at)->diffForHumans();

    // Pisahkan tanggal awal dan akhir
    [$startDate, $endDate] = explode(' to ', $event->tanggal_event);

    // Format ulang
    $startDateFormatted = Carbon::parse($startDate)->translatedFormat('d M');
    $endDateFormatted = Carbon::parse($endDate)->translatedFormat('d M Y');
@endphp
@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Event
                    Detail</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Event {{ $module }}</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- =============================== Blog Page section start =============================== -->
    <section class="py-60">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="position-relative">
                            <div class="w-100 h-100 overflow-hidden">
                                <img src="{{ asset('public/event-banner/' . $event->banner) }}"
                                    class="w-100 h-100 object-fit-cover hover-scale-108 tw-duration-500">
                            </div>
                        </div>
                        <div class="tw-mt-10">
                            <div class="tw-mb-4 d-flex align-items-center tw-gap-205 flex-wrap">
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg">
                                        <i class="ph ph-user"></i>
                                    </span>
                                    <span class="text-neutral-600 tw-text-sm">{{ $event->oleh }}</span>
                                </div>
                                <span class="tw-w-205 border border-neutral-200"></span>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg">
                                        <i class="ph-bold ph-thumbs-up"></i>
                                    </span>
                                    <span class="text-neutral-600 tw-text-sm">Like (<span
                                            id="teks-like">.html(response.totalLikes);</span>)</span>
                                </div>
                                <span class="tw-w-205 border border-neutral-200"></span>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg">
                                        <i class="ph ph-clock"></i>
                                    </span>
                                    <span class="text-neutral-600 tw-text-sm">{{ $formattedDate }}</span>
                                </div>
                                <span class="tw-w-205 border border-neutral-200"></span>
                                <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                    <span class="text-main-600 tw-text-lg">
                                        <i class="ph ph-eye"></i>
                                    </span>
                                    <span class="text-neutral-600 tw-text-sm">{{ $event->total_view }}x Dilihat</span>
                                </div>
                            </div>
                            <h3 class="tw-mb-4 cursor-big splitTextStyleOne">{{ $event->nama_event }}</h3>
                            <p class="tw-text-base text-neutral-1000 cursor-small tw-my-6">{!! $event->konten_kegiatan !!}</p>
                            <p class="text-black cursor-small tw-mt-6 mb-2">Kegiatan ini akan dilaksanakan pada: </p>
                            <table class="text-black">
                                <tr>
                                    <td class="tw-text-base cursor-small tw-my-6">
                                        <ul class="d-flex flex-column tw-gap-5 cursor-small">
                                            <li class="d-flex align-items-center tw-gap-4 group">
                                                <span
                                                    class="tw-w-705 tw-h-705 common-shadow-seven bg-white d-flex justify-content-center align-items-center rounded-circle text-main-600 tw-text-lg group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                                    <i class="ph-bold ph-clock"></i>
                                                </span>
                                                <p>Waktu Kegiatan</p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="px-2">:</td>
                                    <td class="tw-text-base cursor-small tw-my-6">
                                        {{ $startDateFormatted . ' Sampai ' . $endDateFormatted }}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="tw-text-base cursor-small tw-my-6">
                                        <ul class="d-flex flex-column tw-gap-5 cursor-small">
                                            <li class="d-flex align-items-center tw-gap-4 group">
                                                <span
                                                    class="tw-w-705 tw-h-705 common-shadow-seven bg-white d-flex justify-content-center align-items-center rounded-circle text-main-600 tw-text-lg group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                                    <i class="ph-bold ph-map-pin-area"></i>
                                                </span>
                                                <p>Tempat Kegiatan</p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="px-2">:</td>
                                    <td class="tw-text-base cursor-small tw-my-6">
                                        {{ $event->tempat }}</td>
                                </tr>
                            </table>
                            @if ($event->dukumen)
                                <div class="d-flex tw-gap-11 flex-wrap d-lg-block mt-4 d-none">
                                    <a href="{{ asset('public/event-document/' . $event->dukumen) }}" target="_blank"
                                        class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                        data-block="button">
                                        <span class="button__flair"></span>
                                        <span class="button__label">Document Tambahan</span>
                                        <span
                                            class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                            <i class="ph-bold ph-file-doc"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif
                            @if ($event->status_daftar)
                                @if ($event_daftar)
                                    <div class="alert alert-success mt-4 text-center" role="alert">
                                        Selamat anda telah mendaftar event ini
                                    </div>
                                @else
                                    @if (auth()->check())
                                        <div class="d-flex my-3 tw-gap-11 flex-wrap d-lg-block">
                                            <form action="{{ route('daftar-event') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="uuid_user" value="{{ auth()->user()->uuid }}">
                                                <input type="hidden" name="uuid_event" value="{{ $event->uuid }}">
                                                <button
                                                    class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                                    data-block="button">
                                                    <span class="button__flair"></span>
                                                    <span class="button__label">Daftar Event</span>
                                                    <span
                                                        class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                                        <i class="ph-bold ph-calendar-check"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-flex my-3 tw-gap-11 flex-wrap d-lg-block">
                                            <a href="{{ route('login.login-akun') }}"
                                                class="cursor-small btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                                                data-block="button">
                                                <span class="button__flair"></span>
                                                <span class="button__label">Daftar Event</span>
                                                <span
                                                    class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                                    <i class="ph-bold ph-calendar-check"></i>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                            <div class="tw-my-11 d-flex justify-content-between flex-wrap tw-gap-6" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="300">
                                <div class="d-flex align-items-start tw-gap-5">
                                    <span class="tw-text-lg fw-semibold text-main-two-600 cursor-small flex-shrink-0">Like
                                        &
                                        Share :</span>
                                    <ul class="cursor-small d-flex align-items-center tw-gap-3 justify-content-center">
                                        <li>
                                            <button id="btn-like"
                                                class="px-3 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                Like <i class="ms-2 ph-bold ph-thumbs-up"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com"
                                                class="tw-w-10 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph-bold ph-facebook-logo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com"
                                                class="tw-w-10 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph-bold ph-x-logo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com"
                                                class="tw-w-10 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200">
                                                <i class="ph-bold ph-instagram-logo"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ps-xl-5 ps-lg-4">
                    <div class="d-flex flex-column tw-gap-8">

                        <div class="bg-neutral-50 tw-px-8 tw-py-8" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">
                            <h5
                                class="border-start border-4 border-main-600 text-main-two-600 tw-ps-2 cursor-small splitTextStyleOne tw-mb-6">
                                Pencarian</h5>
                            <form action="#" class="position-relative">
                                <input type="text"
                                    class="cursor-small tw-ps-4 tw-pe-12 tw-py-4 bg-white tw-placeholder-text-main-two-600 focus-outline-0 w-100 tw-placeholder-transition-2 focus-tw-placeholder-text-hidden rounded-0 shadow-none flex-grow-1 border border-white focus-border-main-600 tw-duration-300"
                                    placeholder="Cari event...">
                                <button type="submit"
                                    class="position-absolute top-50 tw--translate-y-50 tw-end-0 text-main-two-600 tw-text-lg d-flex tw-me-5 cursor-big">
                                    <i class="ph-bold ph-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>

                        <div class="bg-neutral-50 tw-px-8 tw-py-8" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">
                            <h5
                                class="border-start border-4 border-main-600 text-main-two-600 tw-ps-2 cursor-small splitTextStyleOne tw-mb-6">
                                Populer</h5>
                            <div class="d-flex flex-column tw-gap-8">
                                @forelse ($event_populer as $item_populer)
                                    @php
                                        [$startDate, $endDate] = explode(' to ', $item_populer->tanggal_event);

                                        // Format ulang
                                        $startDateFormatted = Carbon::parse($startDate)->translatedFormat('d M Y');
                                    @endphp
                                    <div class="d-flex align-items-center tw-gap-6">
                                        <a href="{{ route('event-detail', ['params' => $item_populer->uuid]) }}"
                                            class="tw-rounded-md overflow-hidden flex-shrink-0">
                                            <img src="{{ asset('public/event-banner/' . $item_populer->banner) }}"
                                                alt="" class="object-fit-cover hover-scale-2 tw-duration-500"
                                                style="width: 105px; height: 85px;">
                                        </a>
                                        <div class="">
                                            <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <span class="text-main-600 tw-text-lg">
                                                    <i class="ph-bold ph-calendar-dots"></i>
                                                </span>
                                                <span
                                                    class="text-main-two-600 fw-medium tw-text-sm tw-text-sm">{{ $startDateFormatted }}</span>
                                            </div>
                                            <h6 class="tw-mt-2">
                                                <a href="{{ route('event-detail', ['params' => $item_populer->uuid]) }}"
                                                    class="tw-text-base line-clamp-2 text-main-two-600 hover-text-main-600 cursor-big splitTextStyleOne">{{ $item_populer->nama_event }}</a>
                                            </h6>
                                            <div class="d-flex align-items-center tw-gap-2 mt-1 cursor-small"
                                                style="font-size: 10px">
                                                <span class="text-main-600">
                                                    <i class="ph-bold ph-eye"></i>
                                                </span>
                                                <span class="text-main-two-600 fw-medium">{{ $item_populer->total_view }}x
                                                    Dilihat</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card text-center shadow-sm">
                                        <div class="card-body">
                                            <i class="bi bi-box-seam display-4 text-muted"></i>
                                            <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                            <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="bg-neutral-50 tw-px-8 tw-py-8" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">
                            <h5
                                class="border-start border-4 border-main-600 text-main-two-600 tw-ps-2 cursor-small splitTextStyleOne tw-mb-6">
                                Terbaru</h5>
                            <div class="d-flex flex-column tw-gap-8">
                                @forelse ($event_terbaru as $item_terbaru)
                                    @php
                                        [$startDate, $endDate] = explode(' to ', $item_terbaru->tanggal_event);

                                        // Format ulang
                                        $startDateFormatted = Carbon::parse($startDate)->translatedFormat('d M Y');
                                    @endphp
                                    <div class="d-flex align-items-center tw-gap-6">
                                        <a href="{{ route('event-detail', ['params' => $item_terbaru->uuid]) }}"
                                            class="tw-rounded-md overflow-hidden flex-shrink-0">
                                            <img src="{{ asset('public/event-banner/' . $item_terbaru->banner) }}"
                                                alt="" class="object-fit-cover hover-scale-2 tw-duration-500"
                                                style="width: 105px; height: 85px;">
                                        </a>
                                        <div class="">
                                            <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <span class="text-main-600 tw-text-lg">
                                                    <i class="ph-bold ph-calendar-dots"></i>
                                                </span>
                                                <span
                                                    class="text-main-two-600 fw-medium tw-text-sm tw-text-sm">{{ $startDateFormatted }}</span>
                                            </div>
                                            <h6 class="tw-mt-2">
                                                <a href="{{ route('event-detail', ['params' => $item_terbaru->uuid]) }}"
                                                    class="tw-text-base line-clamp-2 text-main-two-600 hover-text-main-600 cursor-big splitTextStyleOne">{{ $item_terbaru->nama_event }}</a>
                                            </h6>
                                            <div class="d-flex align-items-center tw-gap-2 mt-1 cursor-small"
                                                style="font-size: 10px">
                                                <span class="text-main-600">
                                                    <i class="ph-bold ph-eye"></i>
                                                </span>
                                                <span class="text-main-two-600 fw-medium">{{ $item_terbaru->total_view }}x
                                                    Dilihat</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card text-center shadow-sm">
                                        <div class="card-body">
                                            <i class="bi bi-box-seam display-4 text-muted"></i>
                                            <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                            <p class="text-muted">Silakan tambahkan data terlebih dahulu.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================== Blog Page section End =============================== -->
@endsection
@section('script')
    <script>
        $(function() {
            view();
            like();
        });

        function like() {
            var xsrfToken = getCookieValue('XSRF-TOKEN');
            $.ajax({
                type: 'GET',
                url: @json(route('get-like', ['params' => $event->uuid])),
                data: {
                    xsrfToken: xsrfToken
                },
                success: function(response) {

                    $('#teks-like').html(response.totalLikes);

                    if (response.cookieExists) {
                        // Jika cookie sudah ada, tandai tombol sebagai "unlike"
                        $('#btn-like').html(
                            '<button class="px-3 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200 btn-unlike">Unlike <i class="ms-2 ph-bold ph-thumbs-down"></i></button>'
                        );
                    } else {
                        // Jika cookie belum ada, tandai tombol sebagai "like"
                        $('#btn-like').html(
                            '<button class="px-3 tw-h-10 rounded-0 text-main-two-600 tw-text-xl d-flex justify-content-center align-items-center bg-neutral-50 hover-bg-main-600 hover-text-white hover-border-main-600 active-scale-09 tw-duration-200 btn-like">Like <i class="ms-2 ph-bold ph-thumbs-up"></i></button>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memeriksa cookie:', error);
                }
            });
        }

        // Fungsi untuk mengambil nilai cookie
        function getCookieValue(cookieName) {
            var name = cookieName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return "";
        }

        $(document).on('click', ".btn-like", function(e) {
            e.preventDefault();
            const token = @json(csrf_token());
            const endpoint = @json(route('like', ['params' => $event->uuid]));

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: 'POST',
                url: endpoint,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success == true) {
                        like();
                    } else {
                        console.error('gagal di like');
                    }
                },
                error: function(xhr) {
                    console.error('gagal di like');
                },
            });
        });

        $(document).on('click', ".btn-unlike", function(e) {
            e.preventDefault();
            const token = @json(csrf_token());
            const endpoint = @json(route('unlike', ['params' => $event->uuid]));

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: 'DELETE',
                url: endpoint,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success == true) {
                        like();
                    } else {
                        console.error('gagal di unlike');
                    }
                },
                error: function(xhr) {
                    console.error('gagal di unlike');
                },
            });
        });

        function view() {
            const token = @json(csrf_token());
            const endpoint = @json(route('view', ['params' => $event->uuid]));

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: 'POST',
                url: endpoint,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success == true) {
                        console.log('telah di lihat');
                    } else {
                        console.log('gagal di lihat');
                    }
                },
            });
        }
    </script>
@endsection
