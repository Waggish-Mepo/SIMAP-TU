<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function detail($meetingId)
    {
        return view('meeting.detail', compact('meetingId'));
    }
}
