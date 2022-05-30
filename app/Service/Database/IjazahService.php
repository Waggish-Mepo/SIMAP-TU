<?php

namespace App\Service\Database;

use App\Models\Certificate;
use App\Models\Ijazah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class IjazahService{

    public function index($employeeId, $filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $nomor = $filter['nomor'] ?? null;
        $jurusan = $filter['jurusan'] ?? null;
        $nama_sekolah = $filter['nama_sekolah'] ?? null;
        $npsn = $filter['npsn'] ?? null;

        $query = Ijazah::orderBy('created_at', $orderBy)->where('employee_id', $employeeId);

        if ($nomor !== null) {
            $query->where('nomor', $nomor);
        }

        if ($jurusan !== null) {
            $query->where('jurusan', $jurusan);
        }

        if ($nama_sekolah !== null) {
            $query->where('nama_sekolah', $nama_sekolah);
        }

        if ($npsn !== null) {
            $query->where('npsn', $npsn);
        }

        $ijazah = $query->simplePaginate($per_page);

        return $ijazah->toArray();
    }

    public function detail($ijazahId)
    {
        $ijazah = Ijazah::findOrFail($ijazahId);

        return $ijazah->toArray();
    }

    public function create($employeeId, $payload)
    {
        $ijazahDb = new Ijazah;
        $ijazahDb->id = Uuid::uuid4()->toString();
        $ijazahDb->employee_id = $employeeId;
        $payload['ijazah'] = $payload['ijazah']->store('public/ijazah');
        $payload['ijazah'] = str_replace('public/', '', $payload['ijazah']);
        $ijazah = $this->fill($ijazahDb, $payload);
        $ijazah->save();

        return $ijazah->toArray();
    }

    public function update($ijazahId, $payload)
    {
        $ijazah = Ijazah::findOrFail($ijazahId);
        if (isset($payload['ijazah'])) {
            Storage::delete('public/'.$ijazah->ijazah);
            $payload['ijazah'] = $payload['ijazah']->store('public/ijazah');
            $payload['ijazah'] = str_replace('public/', '', $payload['ijazah']);
        } else {
            $payload['ijazah'] = $ijazah->ijazah;
        }

        $ijazah = $this->fill($ijazah, $payload);
        $ijazah->save();

        return $ijazah->toArray();
    }

    public function delete($ijazahId)
    {
        $ijazah = Ijazah::findOrFail($ijazahId);
        Storage::delete('public/'.$ijazah->ijazah);
        $ijazah->delete();

        return $ijazah->toArray();
    }

    private function fill(Ijazah $ijazah, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $ijazah->$key = $value;
        }

        $validate = Validator::make($ijazah->toArray(), [
            'nomor' => 'required|string',
            'jurusan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'npsn' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'provinsi' => 'required|string',
            'nama_ortu' => 'required|string',
            'nis' => 'required|integer',
            'nisn' => 'required|integer',
            'no_peserta_un' => 'required|string',
            'ijazah' => 'required',
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $ijazah;
    }
}
