<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = [
            [
                'name' => 'adminuser',
                'username' => 'adminuser123',
                'password' => Hash::make('adminuser123'),
                'role' => User::ADMIN,
                'status' => true
            ],
            [
                'name' => 'employeeuser',
                'username' => 'employeeuser123',
                'password' => Hash::make('employeeuser123'),
                'role' => User::EMPLOYEE,
                'status' => true
            ],
            [
                'name' => 'headmasteruser',
                'username' => 'headmasteruser123',
                'password' => Hash::make('headmasteruser123'),
                'role' => User::HEADMASTER,
                'status' => true
            ],
        ];

        foreach ($users as $user) {
            User::factory($user)->create();
        }
    }
}
