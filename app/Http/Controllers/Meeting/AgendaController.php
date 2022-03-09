<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('meeting.agenda.index')->with('user',$user)->with('users',$user);
    }
}
