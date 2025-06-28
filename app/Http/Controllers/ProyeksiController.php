<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyeksiRequest;
use App\Http\Requests\UpdateProyeksiRequest;
use App\Models\Proyeksi;

class ProyeksiController extends BaseController
{
    public function index()
    {
        $module = 'Proyeksi Dan Hasil Capaian';
        return view('admin.royeksi.index', compact('module'));
    }

    public function get()
    {
        $data = Proyeksi::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreProyeksiRequest $storeProyeksiRequest)
    {
        try {
            $data = new Proyeksi();
            $data->tahun = $storeProyeksiRequest->tahun;
            $data->proyeksi = $storeProyeksiRequest->proyeksi;
            $data->capaian = $storeProyeksiRequest->capaian;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add data success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = Proyeksi::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreProyeksiRequest $storeProyeksiRequest, $params)
    {
        $data = Proyeksi::where('uuid', $params)->first();

        try {
            $data->tahun = $storeProyeksiRequest->tahun;
            $data->proyeksi = $storeProyeksiRequest->proyeksi;
            $data->capaian = $storeProyeksiRequest->capaian;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Proyeksi::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
