<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = [
            [
                'username' => 'adminuser123',
                'password' => Hash::make('adminuser123'),
                'role' => User::ADMIN,
                'status' => true
            ],
            [
                'username' => 'employeeuser123',
                'password' => Hash::make('employeeuser123'),
                'role' => User::EMPLOYEE,
                'status' => true
            ],
            [
                'username' => 'headmasteruser123',
                'password' => Hash::make('headmasteruser123'),
                'role' => User::HEADMASTER,
                'status' => true
            ],
        ];

        foreach ($users as $user) {
            $createdUser = User::factory($user)->create();
            Employee::where('id', $createdUser['userable_id'])->update(['jenis_ptk' => Employee::Guru_kelas]);
            if ($createdUser['role'] === User::ADMIN) Employee::where('id', $createdUser['userable_id'])->update(['jenis_ptk' => Employee::Tenaga_Administrasi_Sekolah]);
            elseif ($createdUser['role'] === User::HEADMASTER) Employee::where('id', $createdUser['userable_id'])->update(['jenis_ptk' => Employee::Kepala_Sekolah]);
        }
    }
}
