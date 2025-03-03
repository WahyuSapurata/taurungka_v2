<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Pendaftar;
use App\Models\View;
use Illuminate\Http\Request;

class Action extends BaseController
{
    public function like(Request $request, $params)
    {
        $data = array();
        try {
            $data = new Like();
            $data->uuid_posting = $params;
            $data->unique_id = $request->cookie('XSRF-TOKEN');
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }
    public function unlike(Request $request, $params)
    {
        $data = array();
        try {
            $xsrfToken = $request->cookie('XSRF-TOKEN');
            // Periksa apakah cookie sudah ada di database
            $data = Like::where('unique_id', $xsrfToken)->where('uuid_posting', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }
    public function get_like(Request $request, $params)
    {
        try {
            $xsrfToken = $request->cookie('XSRF-TOKEN');
            // Periksa apakah cookie sudah ada di database
            $data = Like::where('unique_id', $xsrfToken)->where('uuid_posting', $params)->exists();

            // Hitung total like untuk postingan terkait
            $totalLikes = Like::where('uuid_posting', $params)->count();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return response()->json([
            'cookieExists' => $data,
            'totalLikes' => $totalLikes
        ]);
    }

    public function view(Request $request, $params)
    {
        $data_view = View::where('unique_id', $request->cookie('XSRF-TOKEN'))->where('uuid_posting', $params)->first();
        $data = array();
        try {
            if ($data_view == null) {
                $data = new View();
                $data->uuid_posting = $params;
                $data->unique_id = $request->cookie('XSRF-TOKEN');
                $data->save();
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Added data success');
    }

    public function daftar(Request $request)
    {
        $data = array();
        try {
            $data = new Pendaftar();
            $data->uuid_user = $request->uuid_user;
            $data->uuid_event = $request->uuid_event;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return redirect()->back();
    }
}
