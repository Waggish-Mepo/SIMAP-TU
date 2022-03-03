<?php

namespace App\Service\Database;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmployeeService{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $name = $filter['nama'] ?? null;
        $status_pegawai = $filter['status_pegawai'] ?? null;

        $query = Employee::orderBy('created_at', $orderBy);

        if ($name !== null) {
            $query->where('nama', 'LIKE','%'.$name.'%');
        }

        if ($status_pegawai !== null) {
            $query->where('status_pegawai', $status_pegawai);
        }

        $employees = $query->simplePaginate($per_page);

        return $employees->toArray();
    }

    public function detail($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);

        return $employee->toArray();
    }

    public function update($employeeId, $payload)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee = $this->fill($employee, $payload);
        $employee->save();

        if (isset($payload['nama'])) {
            $user = User::where('userable_id', $employeeId);
            $user->update(['name' => $employee->nama]);
        }

        return $employee->toArray();
    }

    private function fill(Employee $employee, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $employee->$key = $value;
        }

        $validate = Validator::make($employee->toArray(), [
            'nama' => 'nullable|string',
            'status_pegawai' => ['nullable', 'string', Rule::in(config('constant.employee.status_pegawai'))],
            'alamat' => 'nullable|string',
            'nip' => 'nullable|numeric',
            'nigk' => 'nullable|numeric',
            'nuptk' => 'nullable|numeric',
            'jenis_ptk' => ['nullable', Rule::in(config('constant.employee.jenis_ptk'))],
            'sk_pengangkatan' => 'nullable|numeric',
            'tmt_pengangkatan' => 'nullable|date',
            'lembaga_pengangkatan' => ['nullable', Rule::in(config('constant.employee.lembaga_pengangkatan'))],
            'sk_cpns' => 'nullable|numeric',
            'tmt_cpns' => 'nullable|date',
            'pangkat' => 'nullable|string',
            'sumber_gaji' => ['nullable', Rule::in(config('constant.employee.sumber_gaji'))],
            'ktp' => 'nullable|numeric',
            'kk' => 'nullable|numeric'
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $employee;
    }
}
