<?php

namespace App\Service\Database;

use App\Models\VisitLetter;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class VisitLetterService{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $no_surat = $filter['no_surat'] ?? null;
        $status = $filter['status'] ?? null;
        $tanggal = $filter['tanggal'] ?? null;

        $query = VisitLetter::orderBy('created_at', $orderBy);

         if ($tanggal !== null) {
            $query->where('tanggal', $tanggal);
        }

        if ($no_surat !== null) {
            $query->where('no_surat', $no_surat);
        }

        if ($status !== null) {
            $query->where('status', $status);
        }

        $visit_letter = $query->simplePaginate($per_page);

        return $visit_letter->toArray();
    }

    public function detail($visitLetterId)
    {
        $visit_letter = VisitLetter::findOrFail($visitLetterId);

        return $visit_letter->toArray();
    }

    public function create($payload)
    {
        $visit_letter = new VisitLetter;
        $visit_letter->id = Uuid::uuid4()->toString();
        $visit_letter = $this->fill($visit_letter, $payload);
        $visit_letter->save();

        return $visit_letter->toArray();
    }

    public function update($visitLetterId, $payload)
    {
        $visit_letter = VisitLetter::findOrFail($visitLetterId);
        if (isset($payload['dokumentasi'])) {
            Storage::delete('public/'.$visit_letter->dokumentasi);
            $payload['dokumentasi'] = $payload['dokumentasi']->store('public/visits');
            $payload['dokumentasi'] = str_replace('public/', '', $payload['dokumentasi']);
        } else {
            $payload['dokumentasi'] = $visit_letter->dokumentasi;
        }

        $visit_letter = $this->fill($visit_letter, $payload);
        $visit_letter->save();

        return $visit_letter->toArray();
    }

    public function delete($visitLetterId)
    {
        $visit_letter = VisitLetter::findOrFail($visitLetterId);
        $visit_letter->delete();

        return $visit_letter->toArray();
    }

    private function fill(VisitLetter $visit_letter, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $visit_letter->$key = $value;
        }

        $validate = Validator::make($visit_letter->toArray(), [
            'no_surat' => 'nullable|string',
            'lampiran' => 'nullable|string',
            'perihal' => 'nullable|string',
            'kepada' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jam' => 'nullable|string',
            'tempat' => 'nullable|string',
            'jumlah_peserta' => 'nullable|integer',
            'dokumentasi' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'nullable|string'
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $visit_letter;
    }
}
