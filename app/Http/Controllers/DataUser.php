<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

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
}
