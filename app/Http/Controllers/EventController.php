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
}
