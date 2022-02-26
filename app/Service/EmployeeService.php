<?php

use App\Models\Employee;

class EmployeeService
{

    public function index(Employee $employee)
    {
        $content = [
            'nama' => $employee->nama,
            'nip' => $employee->nip,
            'status_pegawai' => $employee->status_pegawai,
        ];

        return $content;
    }
}