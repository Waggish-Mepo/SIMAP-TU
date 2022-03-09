<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotulaController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('meeting.notula.index')->with("user",$user);
    }

    public function detail()
    {
        $user = Auth::user();
        return view('meeting.notula.detail')->with("user",$user);
    }
}
