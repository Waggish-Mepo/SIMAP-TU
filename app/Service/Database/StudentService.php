<?php

namespace App\Service\Database;

use App\Models\Student;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class StudentService{

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 99;
        $name = $filter['nama'] ?? null;
        $nis = $filter['nis'] ?? null;
        $nisn = $filter['nisn'] ?? null;
        $tempat_lahir = $filter['tempat_lahir'] ?? null;

        $query = Student::orderBy('created_at', $orderBy);

        if ($name !== null) {
            $query->where('nama', 'LIKE','%'.$name.'%');
        }

        if ($nis !== null) {
            $query->where('nis', $nis);
        }

        if ($nisn !== null) {
            $query->where('nisn', $nisn);
        }

        if ($tempat_lahir !== null) {
            $query->where('tempat_lahir', 'LIKE','%'.$tempat_lahir.'%');
        }

        $employees = $query->simplePaginate($per_page);

        return $employees->toArray();
    }

    public function create($payload)
    {
        $student = new Student;
        $student->id = Uuid::uuid4()->toString();
        $student = $this->fill($student, $payload);
        $student->save();

        $faker = Faker::create();
        $user = new User;
        $user->id = Uuid::uuid4()->toString();
        $user->userable_id = $student->id;
        $user->name = $payload['nama'];
        $user->username = strtolower(explode(" ",$payload['nama'])[0]).$faker->numerify('####');
        $user->password = bcrypt($user->username);
        $user->status = true;
        $user->role = User::STUDENT;

        $user->save();

        return $student->toArray();
    }

    public function resetPassword($studentId)
    {
        $user = User::where('userable_id', $studentId)->first();
        $user->password = bcrypt($user->username);
        $user->save();

        return $user->toArray();
    }

    public function toggleStatus($studentId)
    {
        $user = User::where('userable_id', $studentId)->first();
        $user->status = !$user->status;
        $user->save();

        return $user->toArray();
    }

    public function detail($studentId)
    {
        $student = Student::findOrFail($studentId);
        $student['user'] = User::where('userable_id', $studentId)->first()->toArray();

        return $student->toArray();
    }

    public function update($studentId, $payload)
    {
        $student = Student::findOrFail($studentId);
        $student = $this->fill($student, $payload);
        $student->save();

        if (isset($payload['nama'])) {
            $user = User::where('userable_id', $studentId);
            $user->update(['name' => $student->nama]);
        }

        return $student->toArray();
    }

    private function fill(Student $student, array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $student->$key = $value;
        }

        $validate = Validator::make($student->toArray(), [
            'nama' => 'required|string',
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan'])
            ],
        ]);

        if($validate->fails()) {
            return $validate->errors()->toArray();
        }

        return $student;
    }
}
