<?php

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class EmployeeService
{
    public function index(Employee $employee)
    {
        $employee = [
            'nama' => $employee->nama,
            'nip' => $employee->nip,
            'status_pegawai' => $employee->status_pegawai,
        ];

        return $employee;
    }

    public function detail($id)
    {
        $employee = Employee::findOrFail($id);

        return $employee->toarray();
    }

    public function update($id)
    {
        Employee::FindOrFail($id);

        $employee = Employee::findOrFail($id);
        $employee = $this->fill($employee);
        $employee->save();

        return $employee;
    }

    public function create(User $user)
    {
        $employee = new Employee;
        $employee->id = $user->userable_id;
        $employee->nama = $user->name;
        $employee = $this->fill($employee);
        $employee->save();

        return $employee;
    }

    public function fill(Employee $employee)
    {
        Validator::make($employee->toarray(), [
            'status_pegawai' => 'required',
            'nip' => 'required|numeric|maxlength:40',
            'nigk' => 'required|numeric|maxlength:40',
            'nuptk' => 'required|numeric|maxlength:40',
            'jenis_ptk' => 'required',
            'sk_pengangkatan' => 'required|numeric|maxlength:40',
            'tmt_pengangkatan' => 'required',
            'lembaga_pengangkatan' => 'required',
            'sk_cpns' => 'required|numeric|maxlength:40',
            'tmt_pns' => 'required',
            'pangkat' => 'required',
            'sumber_gaji' => 'required',
            'kartu_pegawai' => 'required|numeric|maxlength:40',
            'kartu_suami' => 'required|numeric|maxlength:40',
            'kartu_istri' => 'required|numeric|maxlength:40',
            'ktp' => 'required|numeric|maxlength:40',
            'kk' => 'required|numeric|maxlength:40',
        ])->validate();

        return $employee;
    }
}