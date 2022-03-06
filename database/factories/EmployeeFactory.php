<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'status_pegawai' => $this->faker->randomElement(config('constant.employee.status_pegawai')),
            'nip' => $this->faker->numerify('#######'),
            'niy_nigk' => $this->faker->numerify('######'),
            'nuptk' => $this->faker->numerify('#####'),
            'jenis_ptk' => $this->faker->randomElement(config('constant.employee.jenis_ptk')),
            'sk_pengangkatan' => $this->faker->numerify('######'),
            'tmt_pengangkatan' => $this->faker->date('Y_m_d'),
            'lembaga_pengangkatan' => $this->faker->randomElement(config('constant.employee.lembaga_pengangkatan')),
            'sk_cpns' => $this->faker->numerify('########'),
            'tmt_pns' => $this->faker->date('Y_m_d'),
            'sumber_gaji' => $this->faker->randomElement(config('constant.employee.sumber_gaji')),
            'kartu_pegawai' => $this->faker->numerify('#########'),
            'kartu_suami' => $this->faker->numerify('#########'),
            'kartu_istri' => $this->faker->numerify('#########'),
        ];
    }
}
