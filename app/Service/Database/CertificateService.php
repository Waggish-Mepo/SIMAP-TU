<?php

namespace App\Service\Database;

use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class CertificateService{

    public function index($employeeId, $filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $name = $filter['nama'] ?? null;
        $jenis = $filter['jenis'] ?? null;
        $tingkat = $filter['tingkat'] ?? null;

        $query = Certificate::orderBy('created_at', $orderBy)->where('employee_id', $employeeId);

        if ($name !== null) {
            $query->where('nama', $name);
        }

        if ($jenis !== null) {
            $query->where('jenis', $jenis);
        }

        if ($tingkat !== null) {
            $query->where('tingkat', $tingkat);
        }

        $certificate = $query->simplePaginate($per_page);

        return $certificate->toArray();
    }

    public function detail($certificateId)
    {
        $certificate = Certificate::findOrFail($certificateId);

        return $certificate->toArray();
    }

    public function create($employeeId, $payload)
    {
        $certificate = new Certificate;
        $certificate->id = Uuid::uuid4()->toString();
        $certificate->employee_id = $employeeId;
        $payload['sertifikat'] = $payload['sertifikat']->store('public/certificates');
        $payload['sertifikat'] = str_replace('public/', '', $payload['sertifikat']);
        $certificate = $this->fill($certificate, $payload);
        $certificate->save();


        return $certificate->toArray();
    }

    public function update($certificateId, $payload)
    {
        $certificate = Certificate::findOrFail($certificateId);
        if (isset($payload['sertifikat'])) {
            Storage::delete('public/'.$certificate->sertifikat);
            $payload['sertifikat'] = $payload['sertifikat']->store('public/certificates');
            $payload['sertifikat'] = str_replace('public/', '', $payload['sertifikat']);
        } else {
            $payload['sertifikat'] = $certificate->sertifikat;
        }

        $certificate = $this->fill($certificate, $payload);
        $certificate->save();

        return $certificate->toArray();
    }

    public function delete($certificateId)
    {
        $certificate = Certificate::findOrFail($certificateId);
        Storage::delete('public/'.$certificate->sertifikat);
        $certificate->delete();

        return $certificate->toArray();
    }

    private function fill(Certificate $certificate, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $certificate->$key = $value;
        }

        $validate = Validator::make($certificate->toArray(), [
            'nama' => 'required|string',
            'tanggal' => 'required',
            'sertifikat' => 'required',
            'penyelenggara' => 'required|string',
            'jenis' => ['required', Rule::in(config('constant.certificate.jenis'))],
            'tingkat' => ['required', Rule::in(config('constant.certificate.tingkat'))],
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $certificate;
    }
}
