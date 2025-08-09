@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-info btn-sm" id="button-side-form">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" id="svg-button"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <style>
                        #svg-button {
                            fill: #ffffff
                        }
                    </style>
                    <path
                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z" />
                </svg>
                Kembali</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <!--begin::Card body-->
                        <div class="card-body hover-scroll-overlay-y">
                            <form class="form-data" enctype="multipart/form-data">

                                <input type="hidden" name="id">
                                <input type="hidden" name="uuid">

                                <div class="mb-10">
                                    <label class="form-label">Tahun</label>
                                    <select name="tahun" class="form-select" data-control="select2" id="year_select"
                                        data-placeholder="Silahkan pilih tahun">
                                    </select>
                                    <small class="text-danger tahun_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Domain</label>
                                    <input type="text" id="domain" class="form-control" name="domain">
                                    <small class="text-danger domain_error"></small>
                                </div>

                                <div class="row mb-10 indikator-nilai-group">
                                    <div class="col-6">
                                        <label class="form-label">Indikator</label>
                                        <input type="text" class="form-control" name="indikator[]">
                                        <small class="text-danger indikator_error"></small>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Nilai</label>
                                        <input type="text" class="form-control" name="nilai[]">
                                        <small class="text-danger nilai_error"></small>
                                    </div>
                                </div>

                                <div id="ContainerAwal" class="mb-10">
                                    <div class="mb-10 d-grid">
                                        <button type="button" class="btn btn-primary tambahInputBtn">Tambah
                                            Indikator</button>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="d-flex gap-5">
                                    <button type="submit"
                                        class="btn btn-success btn-sm btn-submit d-flex align-items-center"><i
                                            class="bi bi-file-earmark-diff"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            window.history.back();
        })

        const generateSchoolYears = (startYear) => {
            const currentYear = new Date().getFullYear();
            const years = [];

            for (let year = startYear; year <= currentYear; year++) {
                years.push({
                    text: year
                });
            }

            // Balik urutan tahun agar tahun sekarang berada di paling atas
            years.reverse();

            return years;
        };
        const dataYears = generateSchoolYears(2000);
        control.push_select_data(dataYears, '#year_select');

        $(document).ready(function() {
            $(document).on('click', '.tambahInputBtn', function() {
                var inputGroup = `
                        <div class="inputGroupContainer">
                            <div class="row mb-10 indikator-nilai-group">
                                <div class="col-6">
                                <label class="form-label">Indikator</label>
                                <input type="text" class="form-control" name="indikator[]">
                                <small class="text-danger indikator_error"></small>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Nilai</label>
                                    <input type="text" class="form-control" name="nilai[]">
                                    <small class="text-danger nilai_error"></small>
                                </div>
                            </div>

                            <div class="mb-10 d-grid">
                                <button type="button" class="btn btn-danger btn-sm hapusInputBtn">Hapus</button>
                            </div>
                        </div>
                    `;
                $('#ContainerAwal').append(inputGroup);
            });

            $(document).on('click', '.hapusInputBtn', function() {
                $(this).closest('.inputGroupContainer').remove();
            });
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: 'admin/store-ipp',
                data: new FormData($(".form-data")[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal
                            .fire({
                                text: `IPP berhasil di Tambah`,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            .then(function() {
                                window.location.href = 'admin/ipp';
                            });
                    } else {
                        $("form")[0].reset();
                        $("#from_select").val(null).trigger("change");
                        // $(".form-select").val(null).trigger("change");
                        swal.fire({
                            title: response.message,
                            text: response.data,
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function(xhr) {
                    $(".text-danger").html("");
                    $.each(xhr.responseJSON["errors"], function(key, value) {
                        $(`.${key}_error`).html(value);

                        if (key.startsWith("indikator.")) {
                            let index = key.split('.')[1];
                            $('.indikator-nilai-group').eq(index).find('.indikator_error').html(
                                value[0]);
                        }

                        if (key.startsWith("nilai.")) {
                            let index = key.split('.')[1];
                            $('.indikator-nilai-group').eq(index).find('.nilai_error').html(
                                value[0]);
                        }
                    });
                },
            });
        });


        $(function() {});
    </script>
@endsection
