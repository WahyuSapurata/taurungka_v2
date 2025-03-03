<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DataMakassar;
use App\Models\Event;
use App\Models\Like;
use App\Models\Pendaftar;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class Landing extends BaseController
{
    public function home()
    {
        $module = 'Home';
        $data_makassar = DataMakassar::select('uuid', 'nama', 'nilai', 'satuan', 'icon', 'position')
            ->orderBy('position', 'asc') // Urutkan berdasarkan posisi
            ->get();
        return view('landing.home.index', compact('module', 'data_makassar'));
    }

    public function event()
    {
        $module = 'Event';
        $event = Event::paginate(6);
        $event->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();

            $totalLikes = Like::where('uuid_posting', $item->uuid)->count();

            $item->oleh = $user->name;
            $item->total_like = $totalLikes;

            return $item;
        });

        $event_terbaru = Event::latest()
            ->take(4)
            ->get()
            ->map(function ($event) {
                $event->total_view = View::where('uuid_posting', $event->uuid)->count();
                return $event;
            });

        $event_populer = Event::select('events.*')
            ->leftJoin('views', 'events.uuid', '=', 'views.uuid_posting')
            ->selectRaw('COUNT(views.id) as total_view')
            ->groupBy('events.id')
            ->orderByDesc('total_view') // Urutkan berdasarkan jumlah view terbanyak
            ->take(4) // Ambil 4 event dengan view terbanyak
            ->get();
        return view('landing.event.index', compact('module', 'event', 'event_terbaru', 'event_populer'));
    }

    public function event_detail($params)
    {
        $event = Event::where('uuid', $params)->first();

        if ($event) {
            $user = User::where('uuid', $event->uuid_user)->first();
            $event->oleh = $user ? $user->name : 'Tidak Diketahui';

            $view = View::where('uuid_posting', $event->uuid)->count();
            $event->total_view = $view;
        }

        $module = $event->nama_event;
        $event_terbaru = Event::latest()
            ->take(4)
            ->get()
            ->map(function ($event) {
                $event->total_view = View::where('uuid_posting', $event->uuid)->count();
                return $event;
            });

        $event_populer = Event::select('events.*')
            ->leftJoin('views', 'events.uuid', '=', 'views.uuid_posting')
            ->selectRaw('COUNT(views.id) as total_view')
            ->groupBy('events.id')
            ->orderByDesc('total_view') // Urutkan berdasarkan jumlah view terbanyak
            ->take(4) // Ambil 4 event dengan view terbanyak
            ->get();

        if (auth()->check()) {
            $event_daftar = Pendaftar::where('uuid_event', $event->uuid)
                ->where('uuid_user', auth()->user()->uuid)
                ->first();
        } else {
            $event_daftar = null; // Atur nilai default jika tidak ada user yang login
        }
        return view('landing.event.detail', compact('event', 'module', 'event_terbaru', 'event_populer', 'event_daftar'));
    }

    public function search(Request $request)
    {
        $module = $request->search;
        $event = Event::when($request->filled('search'), function ($query) use ($request) {
            return $query->where('nama_event', 'like', "%" . e($request->search) . "%");
        })
            ->paginate(6);

        $event->getCollection()->transform(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();
            $totalLikes = Like::where('uuid_posting', $item->uuid)->count();

            $item->oleh = $user ? $user->name : 'Unknown';
            $item->total_like = $totalLikes;

            return $item;
        });


        $event_terbaru = Event::latest()
            ->take(4)
            ->get()
            ->map(function ($event) {
                $event->total_view = View::where('uuid_posting', $event->uuid)->count();
                return $event;
            });

        $event_populer = Event::select('events.*')
            ->leftJoin('views', 'events.uuid', '=', 'views.uuid_posting')
            ->selectRaw('COUNT(views.id) as total_view')
            ->groupBy('events.id')
            ->orderByDesc('total_view') // Urutkan berdasarkan jumlah view terbanyak
            ->take(4) // Ambil 4 event dengan view terbanyak
            ->get();
        return view('landing.event.search', compact('module', 'event', 'event_terbaru', 'event_populer'));
    }

    public function kontak()
    {
        $module = 'Kontak';
        return view('landing.kontak.index', compact('module'));
    }

    public function absensi($params)
    {
        $module = 'Absensi';
        $data_event = Event::where('uuid', $params)->first();

        if (auth()->check()) {
            $data_absen = Absensi::where('uuid_user', auth()->user()->uuid)->where('uuid_event', $params)->first();
        } else {
            $data_absen = null; // Atur nilai default jika tidak ada user yang login
        }
        return view('landing.absensi.index', compact('module', 'data_event', 'data_absen'));
    }

    public function confirmAbsensi(Request $request, $params)
    {
        $data_absen = Absensi::where('uuid_user', auth()->user()->uuid)->where('uuid_event', $params)->first();

        // Periksa jenis absensi
        if ($request->type === 'checkin' && !$data_absen) {
            $data_absen = new Absensi();
            $data_absen->uuid_user = auth()->user()->uuid;
            $data_absen->uuid_event = $params;
            $data_absen->masuk = true;
            $data_absen->pulang = false;
        } elseif ($request->type === 'checkout' && !$data_absen->pulang) {
            $data_absen->pulang = true;
        }

        $data_absen->save();
        return $this->sendResponse($data_absen, 'Berhasil absen');
    }

    public function statistik_event()
    {
        $module = 'Statistik Event';
        $event = Event::all();
        return view('landing.statistik.index', compact('module', 'event'));
    }

    public function get_statistik($params = null)
    {
        // Jika tidak ada event yang dipilih, ambil semua absensi
        $data_absen = $params ?
            Absensi::where('uuid_event', $params)->get() :
            Absensi::all();

        // Mengelompokkan data berdasarkan kecamatan dan menghitung jumlahnya
        $data_statistik = $data_absen->groupBy(function ($item) {
            return User::where('uuid', $item->uuid_user)->value('kecamatan');
        })->map(function ($items, $kecamatan) {
            return [
                'name' => $kecamatan ?? 'Tidak Diketahui',
                'y' => $items->count()
            ];
        })->values();

        return response()->json([
            'success' => true,
            'data' => $data_statistik
        ]);
    }

    public function get_statistik_jeniskelamin($params = null)
    {
        // Ambil data absensi berdasarkan event (jika ada) tanpa eager loading
        $data_absen = $params
            ? Absensi::where('uuid_event', $params)->get()
            : Absensi::all();

        // Ambil semua user dalam satu query untuk menghindari query berulang
        $userIds = $data_absen->pluck('uuid_user')->unique();
        $users = User::whereIn('uuid', $userIds)->get()->keyBy('uuid');

        // Jenis kelamin yang valid
        $valid_gender = ['laki laki', 'perempuan'];

        // Mengelompokkan data berdasarkan jenis kelamin dan menghitung jumlahnya
        $data_statistik = $data_absen->groupBy(function ($item) use ($users) {
            // Pastikan user ada dalam daftar sebelum mengambil jenis_kelamin
            $user = $users->get($item->uuid_user);
            return $user ? strtolower(trim($user->jenis_kelamin)) : 'tidak diketahui';
        })->map(function ($items, $jenis_kelamin) use ($valid_gender) {
            // Filter hanya untuk laki-laki dan perempuan
            if (!in_array($jenis_kelamin, $valid_gender)) {
                return null;
            }
            return [
                'name' => ucfirst($jenis_kelamin), // Capitalize nama
                'y' => $items->count()
            ];
        })->filter() // Hapus data null
            ->values(); // Reset indeks array

        return response()->json([
            'success' => true,
            'data' => $data_statistik
        ]);
    }

    public function tentang()
    {
        $module = 'Tentang';
        return view('landing.tentang.index', compact('module'));
    }
}
