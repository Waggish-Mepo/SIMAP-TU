<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Admin Dashboard
        if ($user->role === 'ADMIN') {
            return view('admin.dashboard');
        }

        // Headmaster & Employee Dashboard
        return view('dashboard');
    }
}
