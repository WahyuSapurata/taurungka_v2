@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="d-flex gap-5 mt-10">
                                <div class="w-100">
                                    <label class="form-label">Filter Usia</label>
                                    <select class="form-select form-select-sm" id="filter_usia">
                                        <option value="semua" selected>Semua Usia</option>
                                        <option value="16 - 18">SMA (16-18 tahun)</option>
                                        <option value="19 - 24">Kuliah (19-24 tahun)</option>
                                        <option value="25 - 35">Bekerja (25-35 tahun)</option>
                                        <option value="invalid">Usia Tidak Valid</option>
                                    </select>
                                </div>
                                <div class="w-100">
                                    <label class="form-label">Pernah Mengikuti Event</label>
                                    <select class="form-select form-select-sm" id="filter_event">
                                        <option value="semua" selected>Semua</option>
                                        <option value="pernah">Pernah</option>
                                        <option value="belum pernah">Belum Pernah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="py-5 table-responsive">
                                <table id="kt_table_data"
                                    class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300">
                                    <thead class="text-center">
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Data User</th>
                                            {{-- <th>Keterangan</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

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

        // Event pencarian tabel
        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        });

        // Inisialisasi DataTable dengan parameter filter
        const initDatatable = (usia = "semua", event = "semua") => {
            // Hancurkan DataTable jika sudah ada sebelumnya
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            // Inisialisasi DataTable dengan filter
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: {
                    url: '/admin/get-user',
                    type: 'GET',
                    data: function(d) {
                        d.usia = usia;
                        d.event = event;
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'name',
                        className: 'text-center'
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return `
                                    <ul>
                                        <li>NIK : ${row.nik}</li>
                                        <li>No KK : ${row.no_kk}</li>
                                        <li>No HP : ${row.no_hp}</li>
                                        <li>Tempat Lahir : ${row.tempat_lahir}</li>
                                        <li>Tanggal Lahir : ${row.tanggal_lahir}</li>
                                        <li>Usia : ${row.usia} tahun</li>
                                        <li>Jenis Kelamin : ${row.jenis_kelamin}</li>
                                        <li>Status Perkawinan : ${row.status_perkawinan}</li>
                                        <li>Agama : ${row.agama}</li>
                                        <li>Alamat : ${row.alamat}</li>
                                        <li>Kecamatan : ${row.kecamatan}</li>
                                        <li>Kelurahan : ${row.kelurahan}</li>
                                        <li>RT : ${row.rt}</li>
                                        <li>RW : ${row.rw}</li>
                                        <li>Pekerjaan : ${row.pekerjaan}</li>
                                        <li>Pendidikan Terakhir : ${row.pedidikan_terakhir}</li>
                                    </ul>
                                `;
                        }
                    },
                    // {
                    //     data: 'status',
                    //     className: 'text-center',
                    //     render: function(data, type, row, meta) {
                    //         return data == 'pernah' ?
                    //             '<div class="badge badge-success">Mengikuti</div>' :
                    //             '<div class="badge badge-warning">Belum pernah mengikuti event</div>';
                    //     }
                    // }
                ],
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.context[0]._iDisplayStart;
                    var rowIndex = startIndex + index + 1;
                    $('td', row).eq(0).html(rowIndex);
                },
            });
        };

        // Load pertama kali dengan default filter
        $(document).ready(function() {
            initDatatable();
            // Event listener untuk perubahan pada select
            $('#filter_usia, #filter_event').on('change', function() {
                let usia = $('#filter_usia').val();
                let event = $('#filter_event').val();
                initDatatable(usia, event);
            });
        });
    </script>
@endsection
