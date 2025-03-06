<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Register extends BaseController
{
    public function register(RegisterRequest $registerRequest)
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
        return $this->sendResponse($data, 'Register user success');
    }
}
