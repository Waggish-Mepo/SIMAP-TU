<?php

namespace App\Service\Database;

use App\Models\Meeting as ModelsMeeting;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;


class MeetingService
{
    public function index($filter = [])
    {
        $orderBy = $filter['orderBy'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $materi = $filter['materi'] ?? null;
        $status = $filter['status'] ?? null;

        $query = ModelsMeeting::orderBy('created_at', $orderBy);

        if ($materi !== null) {
            $query->where('materi', 'LIKE', '%' . $materi . '%');
        }

        if ($status !== null) {
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

        $meet->id = Uuid::uuid4()->toString();
        $meet->status = false;
        $meet = $this->fill($meet, $payload);
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

        $validate = Validator::make($meeting->toarray(), [
            'materi' => 'nullable|string',
            'tempat' => 'nullable|string',
            'pimpinan_rapat' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|string',
            'status' => 'nullable|boolean',
            'dokumentasi' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        return $meeting;
    }
}