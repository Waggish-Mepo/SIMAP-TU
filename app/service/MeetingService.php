<?php

use App\Models\AgendaMeeting;
use App\Models\Employee;
use App\Models\Meeting as ModelsMeeting;
use App\Models\Notula;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Validator;


class Meeting
{
    public function index($fillter = [])
    {
        $orderBy = $fillter['orderBy'] ?? 'DESC';
        $per_page = $fillter['per_page'] ?? 99;
        $materi = $fillter['materi'] ?? null;
        $status = $fillter['status'] ?? null;

        $query = ModelsMeeting::orderBy('ceated_at', $orderBy);

        if ($materi === null) {
            $query->where('materi', 'LIKE', '%' . $materi . '%');
        }

        if ($status === null) {
            $query->where('status', $status);
        }

        $meet = $query->simplePaginate($per_page);

        return $meet->toarray();
    }

    public function detail($meetingId)
    {
        ModelsMeeting::findOrFail($meetingId);

        $meet = ModelsMeeting::findOrFail($meetingId);

        return $meet->toarray();
    }

    public function create($payload)
    {
        $meet = new ModelsMeeting;
        $notula = new AgendaMeeting;

        $meet->id = Uuid::uuid();
        $notula->id = Uuid::uuid();
        $meet = $this->fill($meet, $payload);

        $notula->save();
        $meet->save();

        return $meet->toarray();
    }

    public function update($meetingId, $payload)
    {
        ModelsMeeting::findOrFail($meetingId);

        $meet = ModelsMeeting::findOrFail($meetingId);
        $meet = $this->fill($meet, $payload);
        $meet->save();

        return $meet->toarray();
    }

    public function fill(ModelsMeeting $meeting, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $meeting->$key = $value;
        }

        Validator::make($meeting->toarray(), [
            'materi' => 'nullable|string',
            'tempat' => 'nullable|string',
            'pimpinan_rapat' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|string',
            'status' => 'nullable|boolean',
            'dokumentasi' => 'nullable|string',
        ])->validate();

        return $meeting;
    }
}