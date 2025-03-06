<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <link rel="shortcut icon" href="{{ asset('pemkot.png') }}" />
    <title>{{ config('app.name') }} | Login</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Si Peka (Sistem Informasi Pengetesan Kemiskinan) Adalah Wadah Perencanaan, Monitoring Pelakasanaan dan Evaluasi Kinerja Program Pengetesan Kemiskinan Terintegrasi Dengan Konsep Kolaborasi Program dan Anggaran." />
    <meta name="keywords" content="Kemiskinan, perencanaan, monitoring, evaluasi" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body"
    class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column justify-content-center flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-none d-lg-flex justify-content-center align-items-center">
                <img src="{{ asset('pemkot.png') }}" class="w-50" alt="">
            </div>
            <!--begin::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Body-->
                    <div class="py-20 shadow-lg"
                        style="background: rgb(110 101 101 / 50%); padding: 50px; border-radius: 10px">
                        <div class="d-flex d-lg-none justify-content-center align-items-center">
                            <img src="{{ asset('pemkot.png') }}" style="width: 80px; margin-bottom: 10px"
                                alt="">
                        </div>
                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('login.login-proses') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-white fw-bolder mb-3">LOGIN</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-white fw-semibold fs-6">Masukkan data anda</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Username" name="username"
                                    value="{{ old('username') }}" autocomplete="off" class="form-control" />
                                @error('username')
                                    <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <div class="position-relative">
                                            <input placeholder="Password" type="password" name="password"
                                                autocomplete="off" class="form-control" />
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Login</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>

                        <div class="d-grid mt-2">
                            <button type="button" class="btn btn-success" data-kt-drawer-show="true"
                                data-kt-drawer-target="#side_form" id="button-side-form" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_1">
                                Daftar
                            </button>
                        </div>

                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content shadow-none">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Registrasi User</h3>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                            </svg>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <form class="form-data" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-10">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" id="name" class="form-control"
                                                            name="name">
                                                        <small class="text-danger name_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" id="username" class="form-control"
                                                            name="username">
                                                        <small class="text-danger username_error"></small>
                                                    </div>

                                                    <div class="mb-10" data-kt-password-meter="true">
                                                        <label class="form-label">Password</label>
                                                        <div class="position-relative mb-3">
                                                            <div class="position-relative">
                                                                <input placeholder="Password" type="password"
                                                                    name="password" autocomplete="off"
                                                                    class="form-control" />
                                                                <span
                                                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                                    data-kt-password-meter-control="visibility">
                                                                    <i class="bi bi-eye-slash fs-2"></i>
                                                                    <i class="bi bi-eye fs-2 d-none"></i>
                                                                </span>
                                                            </div>
                                                            <small class="text-danger password_error"></small>
                                                        </div>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">NIK</label>
                                                        <input type="number" id="nik" class="form-control"
                                                            name="nik">
                                                        <small class="text-danger nik_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">No Kartu Keluarga</label>
                                                        <input type="number" id="no_kk" class="form-control"
                                                            name="no_kk">
                                                        <small class="text-danger no_kk_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Nomo Hanphone</label>
                                                        <input type="number" id="no_hp" class="form-control"
                                                            name="no_hp">
                                                        <small class="text-danger no_hp_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <input type="text" id="tempat_lahir" class="form-control"
                                                            name="tempat_lahir">
                                                        <small class="text-danger tempat_lahir_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <input type="text" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir">
                                                        <small class="text-danger tanggal_lahir_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Usia</label>
                                                        <input type="number" id="usia" class="form-control"
                                                            name="usia">
                                                        <small class="text-danger usia_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-select"
                                                            id="jenis_kelamin">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="laki laki">Laki Laki</option>
                                                            <option value="perempuan">Perempuan</option>
                                                        </select>
                                                        <small class="text-danger jenis_kelamin_error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-10">
                                                        <label class="form-label">Status Perkawinan</label>
                                                        <select name="status_perkawinan" class="form-select"
                                                            id="status_perkawinan">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="kawin">Kawin</option>
                                                            <option value="belum kawin">Belum Kawin</option>
                                                        </select>
                                                        <small class="text-danger status_perkawinan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Agama</label>
                                                        <select name="agama" class="form-select" id="agama">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="islam">Islam</option>
                                                            <option value="kristen">Kristen</option>
                                                            <option value="hindu">Hindu</option>
                                                            <option value="budha">Budha</option>
                                                            <option value="katolik">Katolik</option>
                                                        </select>
                                                        <small class="text-danger agama_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Alamat</label>
                                                        <input type="text" id="alamat" class="form-control"
                                                            name="alamat">
                                                        <small class="text-danger alamat_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Kecamatan</label>
                                                        <select class="form-select form-select-solid"
                                                            data-control="select2" data-dropdown-parent="#kt_modal_1"
                                                            data-allow-clear="true" name="kecamatan"
                                                            data-placeholder="-- Pilih --" id="selectKecamatan">
                                                            <option value="">-- Pilih --</option>
                                                        </select>
                                                        <small class="text-danger kecamatan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Kelurahan</label>
                                                        <select class="form-select form-select-solid"
                                                            data-control="select2" data-dropdown-parent="#kt_modal_1"
                                                            data-allow-clear="true" name="kelurahan"
                                                            data-placeholder="-- Pilih --" id="selectKelurahan">
                                                            <option value="">-- Pilih --</option>
                                                        </select>
                                                        <small class="text-danger kelurahan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Rt</label>
                                                        <input type="text" id="rt" class="form-control"
                                                            name="rt">
                                                        <small class="text-danger rt_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Rw</label>
                                                        <input type="text" id="rw" class="form-control"
                                                            name="rw">
                                                        <small class="text-danger rw_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Pekerjaan</label>
                                                        <input type="text" id="pekerjaan" class="form-control"
                                                            name="pekerjaan">
                                                        <small class="text-danger pekerjaan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Pedidikan Terakhir</label>
                                                        <select name="pedidikan_terakhir" class="form-select"
                                                            id="pedidikan_terakhir">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SMP Sederajat">SMP Sederajat</option>
                                                            <option value="SMA Sederajat">SMA Sederajat</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                        <small class="text-danger pedidikan_terakhir_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <div>
                                                            <label class="form-label">Foto</label>
                                                        </div>
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-empty"
                                                            data-kt-image-input="true"
                                                            style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                                            <!--begin::Image preview wrapper-->
                                                            <div class="image-input-wrapper w-125px h-125px"></div>
                                                            <!--end::Image preview wrapper-->

                                                            <!--begin::Edit button-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                                <!--begin::Inputs-->
                                                                <input type="file" name="foto"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->

                                                            <!--begin::Cancel button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel button-->

                                                            <!--begin::Remove button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Remove avatar">
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
                                                    class="btn btn-primary btn-sm btn-submit d-flex align-items-center"><i
                                                        class="bi bi-file-earmark-diff"></i> Simpan</button>
                                                <button type="reset" id="side_form_close" data-bs-dismiss="modal"
                                                    class="btn mr-2 btn-light btn-cancel btn-sm d-flex align-items-center"
                                                    style="background-color: #ea443e65; color: #EA443E"><i
                                                        class="bi bi-trash-fill"
                                                        style="color: #EA443E"></i>Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script><!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/panel.js') }}"></script>
    <!--end::Custom Javascript-->
    @if ($message = Session::get('failed'))
        <script>
            swal.fire({
                title: "Eror",
                text: "{{ $message }}",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            swal.fire({
                title: "Sukses",
                text: "{{ $message }}",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            control.overlay_form('Tambah', 'User');
        })

        $("#tanggal_lahir").flatpickr();

        $(document).ready(function() {
            let apiUrl =
                "https://api.binderbyte.com/wilayah/kecamatan?api_key=786afc727ac65a387950f68a30726d9d76aeaeb1934762761d9dfe74942624d4&id_kabupaten=73.71";

            $.getJSON(apiUrl, function(data) {
                if (data.value && Array.isArray(data.value)) {
                    let select = $("#selectKecamatan");
                    select.append('<option value="">-- pilih --</option>');

                    $.each(data.value, function(index, kecamatan) {
                        select.append(
                            `<option value="${kecamatan.name}" data-id="${kecamatan.id}">${kecamatan.name}</option>`
                        );
                    });
                }
            }).fail(function() {
                console.error("Gagal mengambil data kecamatan.");
            });

            // Ambil data kelurahan berdasarkan kecamatan yang dipilih
            $("#selectKecamatan").change(function() {
                let kecamatanId = $("#selectKecamatan option:selected").data(
                    "id"); // Ambil ID untuk query API
                let kecamatanName = $(this).val(); // Nama kecamatan yang akan dikirim ke database
                let kelurahanUrl =
                    `https://api.binderbyte.com/wilayah/kelurahan?api_key=786afc727ac65a387950f68a30726d9d76aeaeb1934762761d9dfe74942624d4&id_kecamatan=${kecamatanId}`;

                $("#selectKelurahan").empty().append('<option value="">-- Pilih --</option>');

                if (kecamatanId) {
                    $.getJSON(kelurahanUrl, function(data) {
                        if (data.value && Array.isArray(data.value)) {
                            $.each(data.value, function(index, kelurahan) {
                                // Value tetap nama kelurahan agar yang dikirim ke database adalah nama, bukan ID
                                $("#selectKelurahan").append(
                                    `<option value="${kelurahan.name}">${kelurahan.name}</option>`
                                );
                            });
                        }
                    }).fail(function() {
                        console.error("Gagal mengambil data kelurahan.");
                    });
                }
            });
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            let type = $(this).attr('data-type');
            if (type == 'add') {
                control.submitFormMultipartData('/login/registrasi-user', 'Register', 'User', 'POST');
            }
        });
    </script>

</body>
<!--end::Body-->

</html>
