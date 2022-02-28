<?php

use App\Models\AgendaMeeting;
use App\Models\Employee;
use App\Models\Meeting as ModelsMeeting;
use App\Models\Notula;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Validator;


class Meeting
{

    public function index(ModelsMeeting $meeting, AgendaMeeting $agenda)
    {
        $meet = [
            'materi' => $meeting->materi,
            'tanggal' => $meeting->tanggal,
            'narasumber' => $agenda->narasumber,
            'waktu' => $meeting->waktu,
            'status' => $meeting->status,
        ];

        return $meet;
    }

    public function detail($meetingId)
    {
        ModelsMeeting::findOrFail($meetingId);

        $meet = ModelsMeeting::findOrFail($meetingId);

        return $meet->toarray();
    }

    public function create($notulaId)
    {
        Notula::findOrFail($notulaId);

        $meet = new ModelsMeeting;

        $meet->id = Uuid::uuid();
        $meet->notula_id = $notulaId;
        $meet = $this->fill($meet);

        $meet->save();

        return $meet->toarray();
    }

    public function update($meetingId)
    {
        ModelsMeeting::findOrFail($meetingId);

        $meet = ModelsMeeting::findOrFail($meetingId);
        $meet = $this->fill($meet);
        $meet->save();

        return $meet->toarray();
    }

    public function fill(ModelsMeeting $meeting)
    {
        Validator::make($meeting->toarray(), [
            'materi' => 'required',
            'tempat' => 'required',
            'pimpinan_rapat' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'status' => 'required',
            'dokumentasi' => 'required',
        ])->validate();

        return $meeting;
    }
}