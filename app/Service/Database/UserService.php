<?php

namespace App\Service\Database;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class UserService{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $name = $filter['nama'] ?? null;
        $status = $filter['status'] ?? null;

        $query = User::orderBy('created_at', $orderBy);

        if ($name !== null) {
            $query->where('name', $name);
        }

        if ($status !== null) {
            $query->where('status', $status);
        }

        $employees = $query->simplePaginate($per_page);

        return $employees->toArray();
    }

    public function detail($userId)
    {
        $user = User::findOrFail($userId);

        return $user->toArray();
    }

    public function create($payload)
    {
        $user = new User;
        $user->id = Uuid::uuid4()->toString();
        $user = $this->fill($user, $payload);
        $user->save();

        return $user->toArray();
    }

    public function update($userId, $payload)
    {
        $user = User::findOrFail($userId);
        $user = $this->fill($user, $payload);
        $user->save();

        if (isset($payload['name'])) {
            $employee = Employee::findOrFail($user->userable_id);
            $employee->nama = $user->name;
            $employee->save();
        }

        return $user->toArray();
    }

    private function fill(User $user, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $user->$key = $value;
        }

        $validate = Validator::make($user->toArray(), [
            'nama' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|numeric',
            'role' => ['required', Rule::in(config('constant.user.roles'))],
            'status' => 'nullable|boolean',
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $user;
    }
}
