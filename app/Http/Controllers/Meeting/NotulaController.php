<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotulaController extends Controller
{
    public function index()
    {
        return view('meeting.notula.index');
    }

    public function detail($meetingId)
    {
        return view('meeting.notula.detail', compact('meetingId'));
    }
}
