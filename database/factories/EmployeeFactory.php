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

        $nama = $this->faker->firstName();

        $status_pegawai = [
            Employee::PNS,
            Employee::PNS_Depang,
            Employee::PNS_Diperbantukan,
            Employee::GTY,
            Employee::PTT_Provinsi,
            Employee::PTT_kab_kota,
            Employee::Guru_Bantu_Pusat,
            Employee::Guru_Honor,
            Employee::Tenaga_Honor,
            Employee::CPNS,
        ];


        $jenis_ptk = [
            Employee::Guru_kelas,
            Employee::Guru_mapel,
            Employee::Guru_BK,
            Employee::Guru_Inklusi,
            Employee::Tenaga_Administrasi_Sekolah,
            Employee::Guru_Pendamping,
            Employee::Guru_Magang,
            Employee::Guru_TIK,
            Employee::Kepala_Sekolah,
            Employee::Laboran,
            Employee::Pustakawan,
        ];

        $lembaga_pengangkatan = [
            Employee::Pemerintah_Pusat,
            Employee::Pemerintah_Provinsi,
            Employee::Pemerintah_Kota,
            Employee::Ketua_Yayasan,
            Employee::Komite_Sekolah,
        ];

        $sumber_gaji = [
            Employee::APBN,
            Employee::APBD_Provinsi,
            Employee::APBD_Kota,
            Employee::Yayasan,
            Employee::Sekolah,
            Employee::Lembaga_Donor,
        ];

        return [
            'status_pegawai' => $this->faker->randomElement($status_pegawai),
            'nip' => $this->faker->numerify('#######'),
            'nigk' => $this->faker->numerify('######'),
            'nuptk' => $this->faker->numerify('#####'),
            'jenis_ptk' => $this->faker->randomElement($jenis_ptk),
            'sk_pengangkatan' => $this->faker->numerify('######'),
            'tmt_pengangkatan' => $this->faker->date(),
            'lembaga_pengangkatan' => $this->faker->randomElement($lembaga_pengangkatan),
            'sk_cpns' => $this->faker->numerify('########'),
            'tmt_pns' => $this->faker->date(),
            'sumber_gaji' => $this->faker->randomElement($sumber_gaji),
            'kartu_pegawai' => $this->faker->numerify('#########'),
            'kartu_suami' => $this->faker->numerify('#########'),
            'kartu_istri' => $this->faker->numerify('#########'),
        ];
    }
}