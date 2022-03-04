<?php

namespace App\Service\Database;

use App\Models\LetterOut;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class LetterOutService{

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
            $query->where('sifat', $sifat);
        }

        $letter_out = $query->simplePaginate($per_page);

        return $letter_out->toArray();
    }

    public function detail($LetterOutId)
    {
        $letter_out = LetterOut::findOrFail($LetterOutId);

        return $letter_out->toArray();
    }

    public function create($payload)
    {
        $letter_out = new LetterOut;
        $letter_out->id = Uuid::uuid4()->toString();
        $letter_out = $this->fill($letter_out, $payload);
        $letter_out->save();

        return $letter_out->toArray();
    }

    public function update($LetterOutId, $payload)
    {
        $letter_out = LetterOut::findOrFail($LetterOutId);
        $letter_out = $this->fill($letter_out, $payload);
        $letter_out->save();

        return $letter_out->toArray();
    }

    private function fill(LetterOut $letter_out, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $letter_out->$key = $value;
        }

        $validate = Validator::make($letter_out->toArray(), [
            'no_surat' => 'nullable|string',
            'tgl_surat' => 'nullable|date',
            'perihal' => 'nullable|string',
            'sifat' => ['nullable', 'string', Rule::in(config('constant.letter_out.sifat'))],
            'lampiran' => 'nullable|string',
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $letter_out;
    }
}
