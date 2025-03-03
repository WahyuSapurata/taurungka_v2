<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard_admin()
    {
        $module = 'Dashboard';
        $total_user = User::where('role', 'user')->count();
        $total_user_male = User::where('role', 'user')->where('jenis_kelamin', 'laki laki')->count();
        $total_user_famale = User::where('role', 'user')->where('jenis_kelamin', 'perempuan')->count();
        $total_event = Event::count();
        return view('dashboard.admin', compact('module', 'total_user', 'total_user_male', 'total_user_famale', 'total_event'));
    }
}
