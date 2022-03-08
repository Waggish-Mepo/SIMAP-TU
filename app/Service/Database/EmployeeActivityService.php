<?php

namespace App\Service\Database;

use App\Models\Employee;
use Illuminate\Validation\Rule;
use App\Models\EmployeeActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;


class EmployeeActivityService
{
    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $nama_kegiatan = $filter['nama_kegiatan'] ?? null;
        $kategori = $filter['kategori'] ?? null;
        $employeeId = $filter['employee_id'] ?? null;

        $query = EmployeeActivity::orderBy('created_at', $orderBy);

        if ($employeeId !== null) {
            $query->where('employee_id', $employeeId);
        }

        if ($nama_kegiatan !== null) {
            $query->where('nama_kegiatan', 'LIKE', '%' . $nama_kegiatan . '%');
        }


        if ($kategori !== null) {
            $query->where('kategori', $kategori);
        }

        $activity = $query->simplePaginate($per_page);

        return $activity->toArray();
    }

    public function detail($employeeId)
    {
        $employee = EmployeeActivity::findOrFail($employeeId);

        return $employee->toArray();
    }

    public function create($payload)
    {

        $user = Auth::user();

        $activity = new EmployeeActivity;
        $activity->id = Uuid::uuid4()->toString();
        $activity->employee_id = $user->userable_id;
        $activity = $this->fill($activity, $payload);

        $activity->save();

        return $activity->toArray();
    }

    public function update($activityId, $payload)
    {
        $activity = EmployeeActivity::findOrFail($activityId);
        $activity = $this->fill($activity, $payload);
        $activity->save();

        return $activity->toArray();
    }

    public function fill(EmployeeActivity $activity, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $activity->$key = $value;
        }

        $validate = Validator::make($activity->toArray(), [
            'nama_kegiatan' => 'nullable|string',
            'tgl_kegiatan' => 'nullable|date',
            'kategori' => ['nullable', Rule::in(config('constant.employee_activity.kategori'))],
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $activity;
    }
}