<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataUser extends BaseController
{
    public function index()
    {
        $module = "Data User";
        return view('admin.user.index', compact('module'));
    }

    public function get(Request $request)
    {
        $query = User::where('role', 'user');

        // Filter Usia
        if ($request->usia && $request->usia != 'semua') {
            $usiaRange = explode(' - ', $request->usia);
            if (count($usiaRange) == 2) {
                $query->whereBetween('usia', [$usiaRange[0], $usiaRange[1]]);
            } elseif ($request->usia == 'invalid') {
                $query->where(function ($q) {
                    $q->where('usia', '<', 16)->orWhere('usia', '>', 35);
                });
            }
        }

        // Filter Event (Cek apakah user sudah pernah absen di suatu event)
        if ($request->event && $request->event != 'semua') {
            if ($request->event == 'pernah') {
                // User yang sudah pernah ikut event (ada di tabel Absensi)
                $query->whereIn('uuid', Absensi::pluck('uuid_user'));
            } elseif ($request->event == 'belum') {
                // User yang belum pernah ikut event (tidak ada di tabel Absensi)
                $query->whereNotIn('uuid', Absensi::pluck('uuid_user'));
            }
        }

        // Eksekusi query sebelum dikirim sebagai respons
        $data = $query->get();


        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah User';
        return view('admin.user.tambah', compact('module'));
    }

    public function store(RegisterRequest $registerRequest)
    {
        $newFoto = '';
        if ($registerRequest->file('foto')) {
            $extension = $registerRequest->file('foto')->extension();
            $newFoto = $registerRequest->name . '-' . now()->timestamp . '.' . $extension;
            $registerRequest->file('foto')->storeAs('public/register', $newFoto);
        }

        try {
            $data = new User();
            $data->name = $registerRequest->name;
            $data->username = $registerRequest->username;
            $data->password = $registerRequest->password;
            $data->current_password = $registerRequest->password;
            $data->nik = $registerRequest->nik;
            $data->no_kk = $registerRequest->no_kk;
            $data->no_hp = $registerRequest->no_hp;
            $data->tempat_lahir = $registerRequest->tempat_lahir;
            $data->tanggal_lahir = $registerRequest->tanggal_lahir;
            $data->usia = $registerRequest->usia;
            $data->jenis_kelamin = $registerRequest->jenis_kelamin;
            $data->status_perkawinan = $registerRequest->status_perkawinan;
            $data->agama = $registerRequest->agama;
            $data->alamat = $registerRequest->alamat;
            $data->kecamatan = $registerRequest->kecamatan;
            $data->kelurahan = $registerRequest->kelurahan;
            $data->rt = $registerRequest->rt;
            $data->rw = $registerRequest->rw;
            $data->pekerjaan = $registerRequest->pekerjaan;
            $data->pedidikan_terakhir = $registerRequest->pedidikan_terakhir;
            $data->foto = $newFoto;
            $data->role = "user";
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add user success');
    }

    public function edit($params)
    {
        $module = 'Edit User';
        $data = User::where('uuid', $params)->first();
        return view('admin.user.edit', compact('module', 'data'));
    }

    public function update(RegisterRequest $registerRequest, $params)
    {
        $data = User::where('uuid', $params)->first();

        $oldFotoPath = public_path('/public/register/' . $data->foto);

        $newFoto = '';
        if ($registerRequest->file('foto')) {
            $extension = $registerRequest->file('foto')->extension();
            $newFoto = $registerRequest->name . '-' . now()->timestamp . '.' . $extension;
            $registerRequest->file('foto')->storeAs('public/register', $newFoto);

            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
        }

        try {
            $data->name = $registerRequest->name;
            $data->username = $registerRequest->username;
            $data->password = $registerRequest->password;
            $data->current_password = $registerRequest->password;
            $data->nik = $registerRequest->nik;
            $data->no_kk = $registerRequest->no_kk;
            $data->no_hp = $registerRequest->no_hp;
            $data->tempat_lahir = $registerRequest->tempat_lahir;
            $data->tanggal_lahir = $registerRequest->tanggal_lahir;
            $data->usia = $registerRequest->usia;
            $data->jenis_kelamin = $registerRequest->jenis_kelamin;
            $data->status_perkawinan = $registerRequest->status_perkawinan;
            $data->agama = $registerRequest->agama;
            $data->alamat = $registerRequest->alamat;
            $data->kecamatan = $registerRequest->kecamatan;
            $data->kelurahan = $registerRequest->kelurahan;
            $data->rt = $registerRequest->rt;
            $data->rw = $registerRequest->rw;
            $data->pekerjaan = $registerRequest->pekerjaan;
            $data->pedidikan_terakhir = $registerRequest->pedidikan_terakhir;
            $data->foto = $registerRequest->file('foto') ? $newFoto : $data->foto;
            $data->role = "user";
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update user success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFotoPath = public_path('/public/register/' . $data->foto);
            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete user success');
    }
}
