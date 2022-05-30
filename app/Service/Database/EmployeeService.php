<?php

namespace App\Service\Database;

use App\Models\Employee;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

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

    public function create($payload)
    {
        $employee = new Employee;
        $employee->id = Uuid::uuid4()->toString();
        $employee = $this->fill($employee, $payload);
        $employee->save();

        $faker = Faker::create();
        $user = new User;
        $user->id = Uuid::uuid4()->toString();
        $user->userable_id = $employee->id;
        $user->name = $payload['nama'];
        $user->username = strtolower(explode(" ",$payload['nama'])[0]).$faker->numerify('####');
        $user->password = bcrypt($user->username);
        $user->status = true;
        $user->role = User::EMPLOYEE;
        if ($payload['jenis_ptk'] === 'Tenaga Administrasi Sekolah') $user->role = User::ADMIN;
        if ($payload['jenis_ptk'] === 'Kepala Sekolah') $user->role = User::HEADMASTER;
        $user->save();

        return $employee->toArray();
    }

    public function resetPassword($employeeId)
    {
        $user = User::where('userable_id', $employeeId)->first();
        $user->password = bcrypt($user->username);
        $user->save();

        return $user->toArray();
    }

    public function toggleStatus($employeeId)
    {
        $user = User::where('userable_id', $employeeId)->first();
        $user->status = !$user->status;
        $user->save();

        return $user->toArray();
    }

    public function detail($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee['user'] = User::where('userable_id', $employeeId)->first()->toArray();

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
            'niy_nigk' => 'nullable|numeric',
            'nuptk' => 'nullable|numeric',
            'jenis_ptk' => ['nullable', Rule::in(config('constant.employee.jenis_ptk'))],
            'sk_pengangkatan' => 'nullable|string',
            'tmt_pengangkatan' => 'nullable',
            'lembaga_pengangkatan' => ['nullable', Rule::in(config('constant.employee.lembaga_pengangkatan'))],
            'sk_cpns' => 'nullable|string',
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
