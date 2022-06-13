<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->firstName().' '.$this->faker->lastName();
        $username = strtolower(explode(" ",$name)[0]).$this->faker->numerify('####');

        return [
            'id' => $this->faker->uuid(),
            'userable_id' => Employee::factory(['nama' => $name])->create()->id,
            // 'userable_id' => Student::factory(['nama' => $name])->create()->id,
            'name' => $name,
            'username' => $username,
            'password' => Hash::make($username),
            'role' => $this->faker->randomElement(config('constant.user.roles')),
            'status' => true
        ];
    }

}
