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

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="uuid" value="{{ $data->uuid }}">

                                <input type="hidden" name="password" value="<>password">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-10">
                                            <label class="form-label">Nama</label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ $data->name }}">
                                            <small class="text-danger name_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Username</label>
                                            <input type="text" id="username" class="form-control" name="username"
                                                value="{{ $data->username }}">
                                            <small class="text-danger username_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">NIK</label>
                                            <input type="number" id="nik" class="form-control" name="nik"
                                                value="{{ $data->nik }}">
                                            <small class="text-danger nik_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">No Kartu Keluarga</label>
                                            <input type="number" id="no_kk" class="form-control" name="no_kk"
                                                value="{{ $data->no_kk }}">
                                            <small class="text-danger no_kk_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Nomo Hanphone</label>
                                            <input type="number" id="no_hp" class="form-control" name="no_hp"
                                                value="{{ $data->no_hp }}">
                                            <small class="text-danger no_hp_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                                                value="{{ $data->tempat_lahir }}">
                                            <small class="text-danger tempat_lahir_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="text" id="tanggal_lahir" class="form-control"
                                                name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                            <small class="text-danger tanggal_lahir_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Usia</label>
                                            <input type="number" id="usia" class="form-control" name="usia"
                                                value="{{ $data->usia }}">
                                            <small class="text-danger usia_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                                <option value="laki laki"
                                                    {{ $data->jenis_kelamin == 'laki laki' ? 'selected' : '' }}>Laki Laki
                                                </option>
                                                <option value="perempuan"
                                                    {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                            <small class="text-danger jenis_kelamin_error"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-10">
                                            <label class="form-label">Status Perkawinan</label>
                                            <select name="status_perkawinan" class="form-select" id="status_perkawinan">
                                                <option value="kawin"
                                                    {{ $data->status_perkawinan == 'kawin' ? 'selected' : '' }}>Kawin
                                                </option>
                                                <option value="belum kawin"
                                                    {{ $data->status_perkawinan == 'belum kawin' ? 'selected' : '' }}>Belum
                                                    Kawin</option>
                                            </select>
                                            <small class="text-danger status_perkawinan_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Agama</label>
                                            <select name="agama" class="form-select" id="agama">
                                                <option value="">-- Pilih --</option>
                                                <option value="islam" {{ $data->agama == 'islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="kristen" {{ $data->agama == 'kristen' ? 'selected' : '' }}>
                                                    Kristen</option>
                                                <option value="hindu" {{ $data->agama == 'hindu' ? 'selected' : '' }}>
                                                    Hindu</option>
                                                <option value="budha" {{ $data->agama == 'budha' ? 'selected' : '' }}>
                                                    Budha</option>
                                                <option value="katolik" {{ $data->agama == 'katolik' ? 'selected' : '' }}>
                                                    Katolik</option>
                                            </select>
                                            <small class="text-danger agama_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" id="alamat" class="form-control" name="alamat"
                                                value="{{ $data->alamat }}">
                                            <small class="text-danger alamat_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Kecamatan</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-allow-clear="true" name="kecamatan" data-placeholder="-- Pilih --"
                                                id="selectKecamatan">
                                                <option value="">-- Pilih --</option>
                                            </select>
                                            <small class="text-danger kecamatan_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Kelurahan</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-allow-clear="true" name="kelurahan" data-placeholder="-- Pilih --"
                                                id="selectKelurahan">
                                                <option value="">-- Pilih --</option>
                                            </select>
                                            <small class="text-danger kelurahan_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Rt</label>
                                            <input type="text" id="rt" class="form-control" name="rt"
                                                value="{{ $data->rt }}">
                                            <small class="text-danger rt_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Rw</label>
                                            <input type="text" id="rw" class="form-control" name="rw"
                                                value="{{ $data->rw }}">
                                            <small class="text-danger rw_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Pekerjaan</label>
                                            <input type="text" id="pekerjaan" class="form-control" name="pekerjaan"
                                                value="{{ $data->pekerjaan }}">
                                            <small class="text-danger pekerjaan_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Pedidikan Terakhir</label>
                                            <select name="pedidikan_terakhir" class="form-select"
                                                id="pedidikan_terakhir">
                                                <option value="SD"
                                                    {{ $data->pedidikan_terakhir == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP Sederajat"
                                                    {{ $data->pedidikan_terakhir == 'SMP Sederajat' ? 'selected' : '' }}>
                                                    SMP Sederajat</option>
                                                <option value="SMA Sederajat"
                                                    {{ $data->pedidikan_terakhir == 'SMA Sederajat' ? 'selected' : '' }}>
                                                    SMA Sederajat</option>
                                                <option value="S1"
                                                    {{ $data->pedidikan_terakhir == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2"
                                                    {{ $data->pedidikan_terakhir == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3"
                                                    {{ $data->pedidikan_terakhir == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                            <small class="text-danger pedidikan_terakhir_error"></small>
                                        </div>

                                        <div class="mb-10">
                                            <div>
                                                <label class="form-label">Foto</label>
                                            </div>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                                style="background-image: url({{ $data->foto ? '/public/icon/' . $data->foto : '/assets/media/svg/avatars/blank.svg' }})">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper w-125px h-125px"></div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Edit button-->

                                                <!--begin::Cancel button-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel button-->

                                                <!--begin::Remove button-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove button-->
                                            </div>
                                            <!--end::Image input-->
                                        </div>
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

        var currentPath = window.location.pathname;
        var pathParts = currentPath.split('/'); // Membagi path menggunakan karakter '/'
        var lastPart = pathParts[pathParts.length - 1]; // Mengambil elemen terakhir dari array

        $(document).on('click', '#button-side-form', function() {
            window.history.back();
        })

        $("#tanggal_lahir").flatpickr();

        $(document).ready(function() {
            const apiKey = "786afc727ac65a387950f68a30726d9d76aeaeb1934762761d9dfe74942624d4";
            const kabupatenId = "73.71";
            const kecamatanUrl =
                `https://api.binderbyte.com/wilayah/kecamatan?api_key=${apiKey}&id_kabupaten=${kabupatenId}`;

            // Data dari server (contoh: Laravel Blade syntax)
            const selectedKecamatan = "{{ $data->kecamatan }}"; // Nama kecamatan yang dipilih
            const selectedKelurahan = "{{ $data->kelurahan }}"; // Nama kelurahan yang dipilih

            // Fungsi untuk menangani error saat mengambil data dari API
            function handleApiError(context, jqXHR, textStatus, errorThrown) {
                console.error(`Gagal mengambil data ${context}:`, textStatus, errorThrown);
            }

            // Ambil data kecamatan dari API
            $.getJSON(kecamatanUrl, function(response) {
                if (response.value && Array.isArray(response.value)) {
                    const selectKecamatan = $("#selectKecamatan");
                    selectKecamatan.empty().append('<option value="">-- Pilih Kecamatan --</option>');

                    response.value.forEach(kecamatan => {
                        const isSelected = (selectedKecamatan === kecamatan.name) ? 'selected' : '';
                        selectKecamatan.append(
                            `<option value="${kecamatan.name}" ${isSelected} data-id="${kecamatan.id}">${kecamatan.name}</option>`
                        );
                    });

                    // Jika kecamatan sudah sesuai, trigger event change untuk memuat kelurahan
                    if (selectedKecamatan) {
                        selectKecamatan.change();
                    }
                } else {
                    console.warn("Data kecamatan tidak ditemukan atau format tidak sesuai.");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                handleApiError("kecamatan", jqXHR, textStatus, errorThrown);
            });

            // Ketika kecamatan dipilih, ambil data kelurahan
            $("#selectKecamatan").change(function() {
                const kecamatanId = $("#selectKecamatan option:selected").data("id");
                const kelurahanUrl =
                    `https://api.binderbyte.com/wilayah/kelurahan?api_key=${apiKey}&id_kecamatan=${kecamatanId}`;
                const selectKelurahan = $("#selectKelurahan");

                selectKelurahan.empty().append('<option value="">-- Pilih Kelurahan --</option>');

                if (kecamatanId) {
                    $.getJSON(kelurahanUrl, function(response) {
                        if (response.value && Array.isArray(response.value)) {
                            response.value.forEach(kelurahan => {
                                const isSelected = (selectedKelurahan === kelurahan.name) ?
                                    'selected' : '';
                                selectKelurahan.append(
                                    `<option value="${kelurahan.name}" ${isSelected}>${kelurahan.name}</option>`
                                );
                            });
                        } else {
                            console.warn(
                                "Data kelurahan tidak ditemukan atau format tidak sesuai.");
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        handleApiError("kelurahan", jqXHR, textStatus, errorThrown);
                    });
                }
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
                url: '/admin/update-user/' + lastPart,
                data: new FormData($(".form-data")[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal
                            .fire({
                                text: `User berhasil di Edit`,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            .then(function() {
                                window.location.href = '/admin/user';
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
                    });
                },
            });
        });


        $(function() {});
    </script>
@endsection
