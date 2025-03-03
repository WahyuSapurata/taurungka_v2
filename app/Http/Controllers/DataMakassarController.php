<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataMakassarRequest;
use App\Http\Requests\UpdateDataMakassarRequest;
use App\Models\DataMakassar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DataMakassarController extends BaseController
{
    public function index()
    {
        $module = 'Makassar Dalam Angka';
        return view('admin.daftarmakassar.index', compact('module'));
    }

    public function get()
    {
        $data = DataMakassar::select('uuid', 'nama', 'nilai', 'satuan', 'icon', 'position')
            ->orderBy('position', 'asc') // Urutkan berdasarkan posisi
            ->get();

        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Data Makassar Dalam Angka';
        return view('admin.daftarmakassar.tambah', compact('module'));
    }

    public function store(StoreDataMakassarRequest $storeDataMakassarRequest)
    {
        $newIcon = '';
        if ($storeDataMakassarRequest->file('icon')) {
            $extension = $storeDataMakassarRequest->file('icon')->extension();
            $newIcon = 'icon' . '-' . now()->timestamp . '.' . $extension;
            $storeDataMakassarRequest->file('icon')->storeAs('public/icon', $newIcon);
        }

        try {
            // Hitung posisi terakhir dan tambahkan +1
            $lastPosition = DataMakassar::max('position') ?? 0;

            $data = new DataMakassar();
            $data->nama = $storeDataMakassarRequest->nama;
            $data->nilai = $storeDataMakassarRequest->nilai;
            $data->satuan = $storeDataMakassarRequest->satuan;
            $data->icon = $newIcon;
            $data->position = $lastPosition + 1; // Menambahkan posisi otomatis
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add daftar makassar success');
    }

    public function edit($params)
    {
        $module = 'Edit Data Makassar Dalam Angka';
        $data = DataMakassar::where('uuid', $params)->first();
        return view('admin.daftarmakassar.edit', compact('module', 'data'));
    }

    public function update(UpdateDataMakassarRequest $updateDataMakassarRequest, $params)
    {
        $data = DataMakassar::where('uuid', $params)->first();

        $oldIconPath = public_path('/public/icon/' . $data->icon);

        $newIcon = '';
        if ($updateDataMakassarRequest->file('icon')) {
            $extension = $updateDataMakassarRequest->file('icon')->extension();
            $newIcon = 'icon' . '-' . now()->timestamp . '.' . $extension;
            $updateDataMakassarRequest->file('icon')->storeAs('public/icon', $newIcon);

            // Hapus foto lama jika ada
            if (File::exists($oldIconPath)) {
                File::delete($oldIconPath);
            }
        }

        try {
            $data->nama = $updateDataMakassarRequest->nama;
            $data->nilai = $updateDataMakassarRequest->nilai;
            $data->satuan = $updateDataMakassarRequest->satuan;
            $data->icon = $updateDataMakassarRequest->file('icon') ? $newIcon : $data->icon;;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update daftar makassar success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = DataMakassar::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldIconPath = public_path('/public/icon/' . $data->icon);
            // Hapus foto lama jika ada
            if (File::exists($oldIconPath)) {
                File::delete($oldIconPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete daftar makassar dalam angka success');
    }

    public function moveUp($uuid)
    {
        DB::beginTransaction();
        try {
            $currentItem = DataMakassar::where('uuid', $uuid)->firstOrFail();

            // Cari item sebelumnya (yang punya position lebih kecil)
            $previousItem = DataMakassar::where('position', '<', $currentItem->position)
                ->orderBy('position', 'desc')
                ->first();

            if ($previousItem) {
                // Tukar posisi
                $tempPosition = $currentItem->position;
                $currentItem->position = $previousItem->position;
                $previousItem->position = $tempPosition;

                $currentItem->save();
                $previousItem->save();
            }

            DB::commit();
            return $this->sendResponse($currentItem, 'Move up success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Move up failed', $e->getMessage(), 400);
        }
    }

    public function moveDown($uuid)
    {
        DB::beginTransaction();
        try {
            $currentItem = DataMakassar::where('uuid', $uuid)->firstOrFail();

            // Cari item berikutnya (yang punya position lebih besar)
            $nextItem = DataMakassar::where('position', '>', $currentItem->position)
                ->orderBy('position', 'asc')
                ->first();

            if ($nextItem) {
                // Tukar posisi
                $tempPosition = $currentItem->position;
                $currentItem->position = $nextItem->position;
                $nextItem->position = $tempPosition;

                $currentItem->save();
                $nextItem->save();
            }

            DB::commit();
            return $this->sendResponse($currentItem, 'Move down success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Move down failed', $e->getMessage(), 400);
        }
    }
}
