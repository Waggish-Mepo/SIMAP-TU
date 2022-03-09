<?php

namespace App\Service\Database;

use App\Models\Letter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class LetterService{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $no_surat = $filter['no_surat'] ?? null;
        $sifat = $filter['sifat'] ?? null;
        $jenis = $filter['jenis'] ?? null;

        $query = Letter::orderBy('created_at', $orderBy);

        if ($no_surat !== null) {
            $query->where('no_surat', 'LIKE','%'.$no_surat.'%');
        }

        if ($jenis !== null) {
            $query->where('jenis', $jenis);
        }

        if ($sifat !== null) {
            $query->where('sifat', $sifat);
        }

        $employees = $query->simplePaginate($per_page);

        return $employees->toArray();
    }

    public function create($payload)
    {
        $letter = new Letter;
        $letter->id = Uuid::uuid4()->toString();
        $letter = $this->fill($letter, $payload);
        $letter->save();

        return $letter->toArray();
    }

    public function delete($certificateId)
    {
        $letter = Letter::findOrFail($certificateId);
        $letter->delete();

        return $letter->toArray();
    }

    public function detail($employeeId)
    {
        $letter = Letter::findOrFail($employeeId);
        return $letter->toArray();
    }

    public function update($employeeId, $payload)
    {
        $letter = Letter::findOrFail($employeeId);
        $letter = $this->fill($letter, $payload);
        $letter->save();

        return $letter->toArray();
    }

    private function fill(Letter $letter, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $letter->$key = $value;
        }

        $validate = Validator::make($letter->toArray(), [
            'no_surat' => 'required|string|max:255',
            'pengirim' => 'nullable|string',
            'sifat' => ['required', Rule::in(config('constant.letter.sifat'))],
            'jenis' => ['required', Rule::in(config('constant.letter.jenis'))],
            'tgl_surat' => 'required|date',
            'tgl_terima' => 'nullable|date',
            'perihal' => 'required|string',
            'lampiran' => 'nullable|string',
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $letter;
    }
}
