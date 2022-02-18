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
                'role' => USER::ADMIN,
            ],
            [
                'name' => 'teacheruser',
                'username' => 'teacheruser123',
                'password' => Hash::make('teacheruser123'), 
                'role' => USER::TEACHER,
            ],
            [
                'name' => 'headmasteruser',
                'username' => 'headmasteruser123',
                'password' => Hash::make('headmasteruser123'), 
                'role' => USER::HEADMASTER,
            ],
        ];;
    }
}
