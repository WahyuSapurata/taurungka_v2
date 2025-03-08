<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Absensi;
use App\Models\Event;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class EventController extends BaseController
{
    public function index()
    {
        $module = 'Manajement Event';
        return view('admin.event.index', compact('module'));
    }

    public function get()
    {
        $data = Event::all();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->nama_user = $user->name;

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Event';
        return view('admin.event.tambah', compact('module'));
    }

    public function store(StoreEventRequest $storeEventRequest)
    {
        $newBanner = '';
        $newDocument = '';
        if ($storeEventRequest->file('banner')) {
            $extension = $storeEventRequest->file('banner')->extension();
            $newBanner = 'banner' . '-' . now()->timestamp . '.' . $extension;
            $storeEventRequest->file('banner')->storeAs('public/event-banner', $newBanner);
        }

        if ($storeEventRequest->file('document')) {
            $extension = $storeEventRequest->file('document')->extension();
            $newDocument = 'document' . '-' . now()->timestamp . '.' . $extension;
            $storeEventRequest->file('document')->storeAs('public/event-document', $newDocument);
        }

        try {
            $data = new Event();
            $data->uuid_user = auth()->user()->uuid;
            $data->nama_event = $storeEventRequest->nama_event;
            $data->tanggal_event = $storeEventRequest->tanggal_event;
            $data->kouta_kegiatan = $storeEventRequest->kouta_kegiatan;
            $data->konten_kegiatan = $storeEventRequest->konten_kegiatan;
            $data->tempat = $storeEventRequest->tempat;
            $data->status_daftar = false;
            $data->banner = $newBanner;
            $data->dukumen = $newDocument;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function edit($params)
    {
        $module = 'Edit Event';
        $data = Event::where('uuid', $params)->first();
        return view('admin.event.edit', compact('module', 'data'));
    }

    public function update(UpdateEventRequest $updateEventRequest, $params)
    {
        $data = Event::where('uuid', $params)->first();

        $oldBannerPath = public_path('/public/event-banner/' . $data->banner);
        $oldDocumentPath = public_path('/public/event-document/' . $data->dukumen);

        $newBanner = '';
        $newDocument = '';
        if ($updateEventRequest->file('banner')) {
            $extension = $updateEventRequest->file('banner')->extension();
            $newBanner = 'banner' . '-' . now()->timestamp . '.' . $extension;
            $updateEventRequest->file('banner')->storeAs('public/event-banner', $newBanner);

            // Hapus foto lama jika ada
            if (File::exists($oldBannerPath)) {
                File::delete($oldBannerPath);
            }
        }

        if ($updateEventRequest->file('document')) {
            $extension = $updateEventRequest->file('document')->extension();
            $newDocument = 'document' . '-' . now()->timestamp . '.' . $extension;
            $updateEventRequest->file('document')->storeAs('public/event-document', $newDocument);

            // Hapus foto lama jika ada
            if (File::exists($oldDocumentPath)) {
                File::delete($oldDocumentPath);
            }
        }

        try {
            $data->uuid_user = auth()->user()->uuid;
            $data->nama_event = $updateEventRequest->nama_event;
            $data->tanggal_event = $updateEventRequest->tanggal_event;
            $data->kouta_kegiatan = $updateEventRequest->kouta_kegiatan;
            $data->konten_kegiatan = $updateEventRequest->konten_kegiatan;
            $data->tempat = $updateEventRequest->tempat;
            $data->status_daftar = false;
            $data->banner = $updateEventRequest->file('banner') ? $newBanner : $data->banner;
            $data->dukumen = $updateEventRequest->file('document') ? $newDocument : $data->dukumen;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update event success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Event::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldBannerPath = public_path('/public/event-banner/' . $data->banner);
            $oldDocumentPath = public_path('/public/event-document/' . $data->dukumen);
            // Hapus foto lama jika ada
            if (File::exists($oldBannerPath)) {
                File::delete($oldBannerPath);
            }
            if (File::exists($oldDocumentPath)) {
                File::delete($oldDocumentPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Event success');
    }

    public function update_tombol($params)
    {
        $data = Event::where('uuid', $params)->first();
        try {
            if ($data->status_daftar == true) {
                $data->status_daftar = false;
            } elseif ($data->status_daftar == false) {
                $data->status_daftar = true;
            }
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update event success');
    }

    public function list_pendaftar($params)
    {
        $module = 'List Pendaftar';
        return view('admin.event.list', compact('module'));
    }

    public function get_list_pendaftar($params)
    {
        $data = Pendaftar::where('uuid_event', $params)->get();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->nama = $user->name;
            $item->kecamatan = $user->kecamatan;
            $item->kelurahan = $user->kelurahan;
            $item->jenis_kelamin = $user->jenis_kelamin;
            $item->umur = $user->usia;
            $item->no_telp = $user->no_hp;

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function generateQrCode($params)
    {
        $qrCodeUrl = url("/absensi/{$params}");
        $qrcode = QrCode::size(300)->generate($qrCodeUrl);
        return view('admin.event.qrcode', compact('params', 'qrcode'));
    }

    public function list_absen($params)
    {
        $module = 'List Absen Peserta';
        return view('admin.event.listabsen', compact('module'));
    }

    public function get_list_absen($params)
    {
        $data = Absensi::where('uuid_event', $params)->get();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->nama = $user->name;

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function export_excel_pendaftar($params)
    {
        $data = Pendaftar::where('uuid_event', $params)->get();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->nama = $user->name;
            $item->kecamatan = $user->kecamatan;
            $item->kelurahan = $user->kelurahan;
            $item->jenis_kelamin = $user->jenis_kelamin;
            $item->umur = $user->usia;
            $item->no_telp = $user->no_hp;

            return $item;
        });

        $data_event = Event::where('uuid', $params)->first();

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Ambil objek aktif (sheet aktif)
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO);
        $sheet->getRowDimension(1)->setRowHeight(30);
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $fontStyle = [
            'font' => [
                'name' => 'Times New Roman',
                'size' => 12,
            ],
        ];

        // Isi data ke dalam sheet
        $centerStyle = [
            'alignment' => [
                //'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $sheet->setCellValue('A1', 'REKAP PENDAFTAR EVENT')->mergeCells('A1:C1');
        $sheet->setCellValue('A2', $data_event->nama_event)->mergeCells('A2:C2');

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Keterangan');

        // Memberikan warna pada sel-sel baris ke-3
        $sheet->getStyle('A3:C3')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'acb9ca', // Warna Peach
                ],
            ],
        ]);

        $row = 4;

        foreach ($data as $index => $lap) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $lap->nama);

            // Membentuk string list dengan newline (\n)
            $userInfo =
                "Kecamatan: {$lap->kecamatan}\n" .
                "Kelurahan: {$lap->kelurahan}\n" .
                "JK: {$lap->jenis_kelamin}\n" .
                "Umur: {$lap->umur}\n" .
                "No. Telp: {$lap->no_telp}";

            // Menggunakan setCellValueExplicit agar Excel membaca newline
            $sheet->setCellValueExplicit('C' . $row, $userInfo, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

            // Mengaktifkan wrap text di Excel
            $sheet->getStyle('C' . $row)->getAlignment()->setWrapText(true);

            $row++;
        }

        // Ambil objek kolom terakhir yang memiliki data (A, B, C, dst.)
        $lastColumn = $sheet->getHighestDataColumn();

        // Iterate melalui kolom-kolom yang memiliki data dan atur lebar kolomnya
        foreach (range('A', $lastColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Menerapkan style alignment untuk seluruh sel dalam spreadsheet
        $sheet->getStyle('A1:' . $lastColumn . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('C4:' . $lastColumn . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A3:I3')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A11:A' . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A1:I1')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('E7:E8')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Memberikan border ke seluruh sel di kolom
        for ($col = 'A'; $col <= 'C'; $col++) {
            $sheet->getStyle($col . '3:' . $col . ($row - 1))->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ]);
        }

        $excelFileName = 'REKAP PENDAFTAR ' . $data_event->nama_event . '.xlsx';
        $excelFilePath = public_path($excelFileName);
        $writer = new Xlsx($spreadsheet);
        $writer->save($excelFilePath);

        // Kembalikan response dengan file Excel yang diunduh
        return response()->download(public_path($excelFileName));
    }

    public function export_excel_absen($params)
    {
        Carbon::setLocale('id'); // Set bahasa ke Indonesia

        $data = Absensi::where('uuid_event', $params)->get();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $item->nama = $user->name;

            return $item;
        });

        $data_event = Event::where('uuid', $params)->first();

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Ambil objek aktif (sheet aktif)
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO);
        $sheet->getRowDimension(1)->setRowHeight(30);
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $fontStyle = [
            'font' => [
                'name' => 'Times New Roman',
                'size' => 12,
            ],
        ];

        // Isi data ke dalam sheet
        $centerStyle = [
            'alignment' => [
                //'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $sheet->setCellValue('A1', 'REKAP ANSENSI EVENT')->mergeCells('A1:D1');
        $sheet->setCellValue('A2', $data_event->nama_event)->mergeCells('A2:D2');

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Absen Masuk');
        $sheet->setCellValue('D3', 'Absen Pulang');

        // Memberikan warna pada sel-sel baris ke-3
        $sheet->getStyle('A3:D3')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'acb9ca', // Warna Peach
                ],
            ],
        ]);

        $row = 4;

        foreach ($data as $index => $lap) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $lap->nama);

            // Cek absen masuk dan format waktunya
            $absenMasuk = $lap->masuk
                ? "Telah absen pada " . Carbon::parse($lap->created_at)->isoFormat('dddd, D MMMM Y [pukul] HH.mm.ss')
                : "-";

            // Cek absen pulang dan format waktunya
            $absenPulang = $lap->pulang
                ? "Telah absen pada " . Carbon::parse($lap->updated_at)->isoFormat('dddd, D MMMM Y [pukul] HH.mm.ss')
                : "-";

            // Menulis hasil ke dalam Excel
            $sheet->setCellValue('C' . $row, $absenMasuk);
            $sheet->setCellValue('D' . $row, $absenPulang);

            $row++;
        }
        // Ambil objek kolom terakhir yang memiliki data (A, B, C, dst.)
        $lastColumn = $sheet->getHighestDataColumn();

        // Iterate melalui kolom-kolom yang memiliki data dan atur lebar kolomnya
        foreach (range('A', $lastColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Menerapkan style alignment untuk seluruh sel dalam spreadsheet
        $sheet->getStyle('A1:' . $lastColumn . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('C4:' . $lastColumn . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A3:I3')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A11:A' . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A1:I1')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('E7:E8')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Memberikan border ke seluruh sel di kolom
        for ($col = 'A'; $col <= 'D'; $col++) {
            $sheet->getStyle($col . '3:' . $col . ($row - 1))->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ]);
        }

        $excelFileName = 'REKAP ABSENSI ' . $data_event->nama_event . '.xlsx';
        $excelFilePath = public_path($excelFileName);
        $writer = new Xlsx($spreadsheet);
        $writer->save($excelFilePath);

        // Kembalikan response dengan file Excel yang diunduh
        return response()->download(public_path($excelFileName));
    }
}
