@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">Event</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Statistik Event</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- =============================== Contact Page section start =============================== -->
    <section class="py-140" id="statistik">
        <div class="container">
            <div class="d-grid mb-5">
                <label for="event" class="form-label text-dark fs-6 fw-bold">Filter Berdasarkan Event</label>
                <select id="event" class="select2">
                    <option value="">-- Semua Event --</option>
                    @foreach ($event as $item)
                        <option value="{{ $item->uuid }}">{{ $item->nama_event }}</option>
                    @endforeach
                </select>
            </div>
            <div id="chart" style="width:100%; height:500px;"></div>
            <div id="chart-jeniskelamin" style="width:100%; height:500px; margin-top: 30px;"></div>
        </div>
    </section>
    <!-- =============================== Contact Page section End =============================== -->
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            // Load semua data saat pertama kali halaman dibuka
            get_statistik(null);
            get_statistik_jeniskelamin(null);

            $("#event").change(function() {
                var value = $(this).val();
                get_statistik(value);
                get_statistik_jeniskelamin(value);
            });
        });

        function get_statistik(value) {
            var url = value ?
                "{{ route('get-statistik', ['params' => 'PLACEHOLDER']) }}".replace("PLACEHOLDER", encodeURIComponent(
                    value)) :
                "{{ route('get-statistik') }}"; // Tanpa parameter kalau value kosong

            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    if (response.success) {
                        updateChart(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', error);
                }
            });
        }

        function get_statistik_jeniskelamin(value) {
            var url = value ?
                "{{ route('get-statistik-jeniskelamin', ['params' => 'PLACEHOLDER']) }}".replace("PLACEHOLDER",
                    encodeURIComponent(
                        value)) :
                "{{ route('get-statistik-jeniskelamin') }}"; // Tanpa parameter kalau value kosong

            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    if (response.success) {
                        updateChartJenisKelamin(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', error);
                }
            });
        }

        function updateChart(data) {
            Highcharts.chart('chart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Statistik Kehadiran Semua Event Per Kecamatan'
                },
                tooltip: {
                    pointFormat: '<b>{point.y} Pemuda</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: ' Pemuda'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.percentage:.2f} %'
                        },
                        showInLegend: true
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    itemStyle: {
                        fontSize: '14px'
                    }
                },
                series: [{
                    name: 'Jumlah Pemuda',
                    colorByPoint: true,
                    data: data // Menggunakan data dari AJAX response
                }]
            });
        }

        function updateChartJenisKelamin(data) {
            Highcharts.chart('chart-jeniskelamin', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Statistik Kehadiran Event Rembuk Pemuda'
                },
                tooltip: {
                    pointFormat: '{point.name}: <b>{point.y} Pemuda ({point.percentage:.2f}%)</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: ' Pemuda'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.y} Pemuda ({point.percentage:.2f}%)'
                        },
                        showInLegend: true
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    itemStyle: {
                        fontSize: '14px'
                    }
                },
                series: [{
                    name: 'Jumlah Pemuda',
                    colorByPoint: true,
                    data: data // Menggunakan data dari AJAX response
                }]
            });
        }
    </script>
@endsection
