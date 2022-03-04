<?php

namespace App\Service\Database;

use App\Models\LetterIn;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class LetterInService
{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $no_surat = $filter['no_surat'] ?? null;
        $sifat = $filter['sifat'] ?? null;

        $query = LetterIn::orderBy('created_at', $orderBy);

        if ($no_surat !== null) {
            $query->where('no_surat', $no_surat);
        }

        if ($sifat !== null) {
            $query->where('sifat', 'LIKE', '%' . $sifat . '%');
        }

        $letterIns = $query->simplePaginate($per_page);

        return $letterIns->toArray();
    }

    public function detail($letterInId)
    {
        $letterIn = LetterIn::findOrFail($letterInId);

        return $letterIn->toArray();
    }

    public function create($payload)
    {
        $letter = new LetterIn;
        $letter->id = Uuid::uuid4()->toString();
        $letter = $this->fill($letter, $payload);

        $letter->save();

        return $letter->toArray();
    }

    public function update($letterInId, $payload)
    {
        $letter = LetterIn::findOrFail($letterInId);
        $letter = $this->fill($letter, $payload);
        $letter->save();

        return $letter->toArray();
    }

    public function fill(LetterIn $letter, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $letter->$key = $value;
        }

        $validate = Validator::make($letter->toArray(), [
            'no_surat' => 'nullable|string',
            'tgl_surat' => 'nullable|date',
            'tgl_terima' => 'nullable|date',
            'perihal' => 'nullable|string',
            'sifat' => ['nullable', 'string', Rule::in(config('constant.letter_in.sifat'))],
            'lampiran' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $letter;
    }
}