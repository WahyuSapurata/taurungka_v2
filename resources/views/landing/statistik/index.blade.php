@extends('landing.layouts.layout')
@section('content')
    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb py-140 tw-pt-106-px mb-0 bg-img" data-background-image="{{ asset('background.png') }}">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo cursor-small text-white fw-bold fst-italic tw-text-xl text-decoration-underline tw-mb-5">IPP</span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big">Indeks Pembangunan Pemuda</h1>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- =============================== Contact Page section start =============================== -->
    <section class="py-140" id="statistik">
        <div class="container">
            <div class="position-relative mb-5">
                <div id="ippChart" style="width:100%; height:500px;">
                </div>
                <div class="d-grid position-absolute justify-content-center text-center w-100" style="top: 50%; gap: 5px;">
                    <h5>Data IPP {{ now()->format('Y') }}</h5>
                    <h5>{{ $avgIpp }}</h5>
                </div>
            </div>

            <div id="proyeksiCapaianChart" style="width:100%; height:500px;"></div>
        </div>
    </section>
    <!-- =============================== Contact Page section End =============================== -->
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Highcharts.chart('ippChart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Donut Chart dengan Nilai'
                },
                subtitle: {
                    text: 'Data IPP'
                },
                plotOptions: {
                    pie: {
                        innerSize: '60%',
                        depth: 45,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}<br>{point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Nilai',
                    data: @json($chartData)
                }],
                tooltip: {
                    pointFormat: '<b>{point.y}</b>'
                },
                // Tampilkan nilai rata-rata di tengah donut
                exporting: {
                    chartOptions: {
                        title: {
                            text: ''
                        }
                    }
                }
            });

            // // Tambahkan nilai rata-rata ke tengah donut
            // let centerText = document.createElement('div');
            // centerText.style.position = 'absolute';
            // centerText.style.left = '50%';
            // centerText.style.top = '50%';
            // centerText.style.transform = 'translate(-50%, -50%)';
            // centerText.style.fontSize = '20px';
            // centerText.style.fontWeight = 'bold';
            // centerText.innerHTML = 'Data IPP<br>{{ $avgIpp }}';

            // document.getElementById('ippChart').appendChild(centerText);

            Highcharts.chart('proyeksiCapaianChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Proyeksi vs Capaian IPP'
                },
                xAxis: {
                    categories: {!! json_encode($tahun) !!},
                    title: {
                        text: 'Tahun'
                    }
                },
                yAxis: {
                    min: 0,
                    max: 100,
                    title: {
                        text: 'Nilai IPP'
                    }
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Proyeksi',
                        data: {!! json_encode($nilaiProyeksi) !!},
                        color: '#7cb5ec'
                    },
                    {
                        name: 'Capaian',
                        data: {!! json_encode($nilaiCapaian) !!},
                        color: '#434348'
                    }
                ]
            });
        });
    </script>
@endsection
