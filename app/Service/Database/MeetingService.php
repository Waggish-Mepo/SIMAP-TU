<?php

namespace App\Service\Database;

use App\Models\Meeting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class MeetingService
{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $materi = $filter['materi'] ?? null;
        $status = $filter['status'] ?? null;

        $query = Meeting::orderBy('created_at', $orderBy);

        if ($materi !== null) {
            $query->where('nama', 'LIKE', '%' . $materi . '%');
        }

        if ($status !== null) {
            $query->where('status', $status);
        }

        $meetings = $query->simplePaginate($per_page);

        return $meetings->toArray();
    }

    public function detail($meetingId)
    {
        $meeting = Meeting::findOrFail($meetingId);

        return $meeting->toArray();
    }

    public function create($payload)
    {
        $meeting = new Meeting;
        $meeting->id = Uuid::uuid4()->toString();
        $meeting = $this->fill($meeting, $payload);
        $meeting->save();

        return $meeting->toArray();
    }

    public function update($meetingId, $payload)
    {
        $meeting = Meeting::findOrFail($meetingId);
        $meeting = $this->fill($meeting, $payload);
        $meeting->save();

        return $meeting->toArray();
    }

    public function delete($meetingId)
    {
        $meeting = Meeting::findOrFail($meetingId);
        $meeting->delete();

        return $meeting->toArray();
    }

    public function fill(Meeting $meeting, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $meeting->$key = $value;
        }

        $validate = Validator::make($meeting->toArray(), [
            'pimpinan_rapat' => 'nullable|string',
            'materi' => 'nullable|string',
            'daftar_hadir' => 'nullable|jsonb',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|string',
            'tempat' => 'nullable|string',
            'status' => ['nullable', Rule::in(config('constant.meeting.status'))],
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $meeting;
    }
}