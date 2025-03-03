@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Absensi Event {{ $data_event->nama_event }}</h1>
                @if (auth()->check())
                    <div class="d-flex my-3 gap-2 flex-wrap d-lg-block justify-content-center">
                        <button id="checkin"
                            class="cursor-small {{ optional($data_absen)->masuk ? 'disabled' : '' }} btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                            data-block="button">
                            <span class="button__flair"></span>
                            <span class="button__label">Check In</span>
                            <span
                                class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                <i class="ph-bold ph-calendar-check"></i>
                            </span>
                        </button>

                        <button id="checkout"
                            class="cursor-small {{ !optional($data_absen)->masuk || optional($data_absen)->pulang ? 'disabled' : '' }} btn btn-main hover-style-two button--stroke tw-py-405 d-inline-flex align-items-center justify-content-center tw-gap-5 group active--translate-y-2"
                            data-block="button">
                            <span class="button__flair"></span>
                            <span class="button__label">Check Out</span>
                            <span
                                class="tw-w-7 tw-h-7 bg-white text-main-600 tw-text-sm tw-rounded d-flex justify-content-center align-items-center position-relative group-hover-bg-main-600 group-hover-text-white tw-duration-500">
                                <i class="ph-bold ph-calendar-check"></i>
                            </span>
                        </button>
                    </div>
                @else
                    <div class="card text-center shadow-sm mt-3">
                        <div class="card-body">
                            <i class="bi bi-box-seam display-4 text-muted"></i>
                            <h5 class="card-title mt-3 text-muted">Belum Login</h5>
                            <p class="text-muted">Silakan login terlebih dahulu.</p>
                            <div class="d-flex tw-gap-11 flex-wrap justify-content-center">
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
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->
@endsection
@section('script')
    <script>
        $('#checkin').click(function() {
            $.post('/absensi-confirm/{{ $data_event->uuid }}', {
                type: 'checkin',
                _token: '{{ csrf_token() }}'
            }, function(response) {
                window.location.href = "{{ route('home') }}";
            });
        });

        $('#checkout').click(function() {
            $.post('/absensi-confirm/{{ $data_event->uuid }}', {
                type: 'checkout',
                _token: '{{ csrf_token() }}'
            }, function(response) {
                window.location.href = "{{ route('home') }}";
            });
        });
    </script>
@endsection
