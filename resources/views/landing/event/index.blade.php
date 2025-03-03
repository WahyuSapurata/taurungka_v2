@php
    use Carbon\Carbon;
    Carbon::setLocale('id');

    function potongTeks($teks, $panjang_maks = 100)
    {
        if (strlen($teks) > $panjang_maks) {
            $teks = substr($teks, 0, $panjang_maks);
            $posisi_spasi_terakhir = strrpos($teks, ' ');
            $teks = substr($teks, 0, $posisi_spasi_terakhir);
            $teks .= '...';
        }
        return $teks;
    }
@endphp
@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Event</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Seluruh Event</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- =============================== Blog Page section start =============================== -->
    <section class="py-60">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row row-gap-4">
                        @forelse ($event as $item)
                            @php
                                // Pisahkan tanggal awal dan akhir
                                [$startDate, $endDate] = explode(' to ', $item->tanggal_event);

                                // Format ulang
                                $startDateFormatted = Carbon::parse($startDate)->translatedFormat('d M');
                                $endDateFormatted = Carbon::parse($endDate)->translatedFormat('d M Y');

                                $formattedDate = Carbon::parse($item->created_at)->diffForHumans();

                                $teks_pendek = potongTeks(strip_tags($item->konten_kegiatan));
                            @endphp
                            <div class="col-md-6">
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <div class="position-relative">
                                        <a href="{{ route('event-detail', ['params' => $item->uuid]) }}"
                                            class="w-100 h-100 overflow-hidden">
                                            <img src="{{ asset('public/event-banner/' . $item->banner) }}" alt=""
                                                style="height: 200px;"
                                                class="w-100 object-fit-cover hover-scale-108 tw-duration-500">
                                        </a>
                                        <h6 class="blog-date cursor-big tw-duration-300 tw-py-2 text-white d-flex justify-content-center align-items-center tw-px-2 text-center tw-rounded-md fw-medium position-absolute top-0 tw-start-0 tw-mt-2 tw-ms-2 bg-main-600 fw-bold font-body"
                                            style="width: max-content; font-size: 16px">
                                            {{ $startDateFormatted }} - {{ $endDateFormatted }}
                                        </h6>
                                    </div>
                                    <div class="tw-mt-10">
                                        <div class="tw-mb-4 d-flex align-items-center tw-gap-205 flex-wrap">
                                            <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <span class="text-main-600 tw-text-lg">
                                                    <i class="ph ph-user"></i>
                                                </span>
                                                <span class="text-neutral-600 tw-text-sm">{{ $item->oleh }}</span>
                                            </div>
                                            <span class="tw-w-205 border border-neutral-200"></span>
                                            <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <span class="text-main-600 tw-text-lg">
                                                    <i class="ph-bold ph-thumbs-up"></i>
                                                </span>
                                                <span class="text-neutral-600 tw-text-sm">Like
                                                    ({{ $item->total_like }})
                                                </span>
                                            </div>
                                            <span class="tw-w-205 border border-neutral-200"></span>
                                            <div class="d-flex align-items-center tw-gap-2 cursor-small">
                                                <span class="text-main-600 tw-text-lg">
                                                    <i class="ph ph-clock"></i>
                                                </span>
                                                <span class="text-neutral-600 tw-text-sm">{{ $formattedDate }}</span>
                                            </div>
                                        </div>
                                        <h3 class="tw-mb-4 cursor-big">
                                            <a href="{{ route('event-detail', ['params' => $item->uuid]) }}"
                                                class="splitTextStyleOne">{{ $item->nama_event }}</a>
                                        </h3>
                                        <p class="tw-text-lg text-neutral-1000 cursor-small">{!! $teks_pendek !!}</p>
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mt-3">
                                {{-- Previous Page Link --}}
                                @if ($event->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">«</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $event->previousPageUrl() }}"
                                            rel="prev">«</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($event->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $event->currentPage())
                                                <li class="page-item active"><span
                                                        class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($event->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $event->nextPageUrl() }}"
                                            rel="next">»</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">»</span></li>
                                @endif
                            </ul>
                        </nav>

                    </div>
                </div>
                <div class="col-lg-4 ps-xl-5 ps-lg-4">
                    <div class="d-flex flex-column tw-gap-8">

                        <div class="bg-neutral-50 tw-px-8 tw-py-8" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">
                            <h5
                                class="border-start border-4 border-main-600 text-main-two-600 tw-ps-2 cursor-small splitTextStyleOne tw-mb-6">
                                Pencarian</h5>
                            <form action="{{ route('search') }}" class="position-relative">
                                <input type="text" name="search"
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
