<?php

namespace App\Service\Database;

use App\Models\Meeting;
use App\Models\Notula;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class NotulaService
{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $notulis = $filter['notulis'] ?? null;

        $query = Notula::orderBy('created_at', $orderBy);

        if ($notulis !== null) {
            $query->where('nama', 'LIKE', '%' . $notulis . '%');
        }


        $notulas = $query->simplePaginate($per_page);

        return $notulas->toArray();
    }

    public function detail($notulaId)
    {
        $notula = Notula::findOrFail($notulaId);

        return $notula->toArray();
    }

    public function create($payload)
    {
        $meeting = new Meeting;
        $notula = new Notula;

        $notula->id = Uuid::uuid4()->toString();
        $notula->meeting_id = $meeting->id;
        $notula = $this->fill($notula, $payload);
        $notula->save();

        return $notula->toArray();
    }

    public function update($notulaId, $payload)
    {
        $notula = Notula::findOrFail($notulaId);
        $notula = $this->fill($notula, $payload);
        $notula->save();

        return $notula->toArray();
    }


    public function fill(Notula $notula, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $notula->$key = $value;
        }

        $validate = Validator::make($notula->toArray(), [
            'notulis' => 'nullable|string',
            'presensi' => 'nullable|integer',
            'pembukaan' => 'nullable|string',
            'pembahasan_rapat' => 'nullable|string',
            'penutup' => 'nullable|string',
            'pokok_pembahasan' => 'nullable|string',
            'hasil_pembahasan' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $notula;
    }
}