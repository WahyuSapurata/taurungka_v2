<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIppRequest;
use App\Http\Requests\UpdateIppRequest;
use App\Models\Ipp;

class IppController extends BaseController
{
    public function index()
    {
        $module = 'IPP';
        return view('admin.ipp.index', compact('module'));
    }

    public function get()
    {
        $data = Ipp::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah IPP';
        return view('admin.ipp.tambah', compact('module'));
    }

    public function store(StoreIppRequest $request)
    {
        $indikatorData = [];

        // Loop indikator dan padankan dengan nilai berdasarkan index
        foreach ($request->indikator as $key => $indikator) {
            $nilai = $request->nilai[$key] ?? null;

            // Validasi internal agar tidak menyimpan kosong/null jika ada data rusak
            if (!empty($indikator) && $nilai !== null) {
                $indikatorData[$indikator] = (float) $nilai;
            }
        }

        try {
            $data = new Ipp();
            $data->tahun = $request->tahun;
            $data->domain = $request->domain;
            $data->indikator = $indikatorData;
            $data->save();

            return $this->sendResponse($data, 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return $this->sendError('Gagal menyimpan data.', $e->getMessage(), 400);
        }
    }

    public function edit($params)
    {
        $module = 'Edit IPP';
        $data = Ipp::where('uuid', $params)->first();
        return view('admin.ipp.edit', compact('module', 'data'));
    }

    public function update(StoreIppRequest $request, $params)
    {
        $indikatorData = [];

        // Loop indikator dan padankan dengan nilai berdasarkan index
        foreach ($request->indikator as $key => $indikator) {
            $nilai = $request->nilai[$key] ?? null;

            // Validasi internal agar tidak menyimpan kosong/null jika ada data rusak
            if (!empty($indikator) && $nilai !== null) {
                $indikatorData[$indikator] = (float) $nilai;
            }
        }

        try {
            $data = Ipp::where('uuid', $params)->first();
            $data->tahun = $request->tahun;
            $data->domain = $request->domain;
            $data->indikator = $indikatorData;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }

    public function delete($params)
    {
        try {
            $data = Ipp::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
