<?php

namespace App\Service\Database;

use App\Models\LetterOut;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;


class LetterOutService
{
    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $no_surat = $filter['no_surat'] ?? null;
        $sifat = $filter['sifat'] ?? null;

        $query = LetterOut::orderBy('created_at', $orderBy);

        if ($no_surat !== null) {
            $query->where('no_surat', $no_surat);
        }

        if ($sifat !== null) {
            $query->where('sifat', 'LIKE', '%' . $sifat . '%');
        }

        $letterOuts = $query->simplePaginate($per_page);

        return $letterOuts->toArray();
    }

    public function detail($letterOutId)
    {
        $letterOut = LetterOut::findOrFail($letterOutId);

        return $letterOut->toArray();
    }

    public function create($payload)
    {
        $letter = new LetterOut();
        $letter->id = Uuid::uuid4()->toString();
        $letter = $this->fill($letter, $payload);

        $letter->save();

        return $letter->toArray();
    }

    public function update($letterOutId, $payload)
    {
        $letter = LetterOut::findOrFail($letterOutId);
        $letter = $this->fill($letter, $payload);
        $letter->save();

        return $letter->toArray();
    }

    public function fill(LetterOut $letter, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $letter->$key = $value;
        }

        $validate = Validator::make($letter->toArray(), [
            'no_surat' => 'nullable|string',
            'tgl_surat' => 'nullable|date',
            'perihal' => 'nullable|string',
            'sifat' => ['nullable', 'string', Rule::in(config('constant.letter_out.sifat'))],
            'lampiran' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $letter;
    }
}