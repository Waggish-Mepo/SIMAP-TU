<?php

use App\Models\Certificate;
use App\Models\Employee;
use App\Models\EmployeeActivity;
use App\Models\LetterIn;
use App\Models\LetterOut;
use App\Models\Meeting;
use App\Models\User;

return [
    'user' => [
        'roles' => [
            User::ADMIN,
            User::EMPLOYEE,
            User::HEADMASTER,
        ],
    ],
    'employee' => [
        'status_pegawai' => [
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
        ],
        'jenis_ptk' => [
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
        ],
        'lembaga_pengangkatan' => [
            Employee::Pemerintah_Pusat,
            Employee::Pemerintah_Provinsi,
            Employee::Pemerintah_Kota,
            Employee::Ketua_Yayasan,
            Employee::Komite_Sekolah,
        ],
        'sumber_gaji' => [
            Employee::APBN,
            Employee::APBD_Provinsi,
            Employee::APBD_Kota,
            Employee::Yayasan,
            Employee::Sekolah,
            Employee::Lembaga_Donor,
        ],
    ],
    'certificate' => [
        'jenis' => [
            Certificate::WEBINAR,
            Certificate::PENGHARGAAN,
            Certificate::PELATIHAN,
            Certificate::SEMINAR,
            Certificate::WORKSHOP,
            Certificate::LAINNYA,
        ],
        'tingkat' => [
            Certificate::KOTA,
            Certificate::PROVINSI,
            Certificate::NASIONAL,
            Certificate::INTERNASIONAL,
            Certificate::LAINNYA,
        ],
    ],
    'letter_out' => [
        'sifat' => [
            LetterOut::Rahasia,
            LetterOut::Penting,
            LetterOut::Segera,
            LetterOut::Biasa,
        ],
    ],
    'letter_in' => [
        'sifat' => [
            LetterIn::Rahasia,
            LetterIn::Penting,
            LetterIn::Segera,
            LetterIn::Biasa,
        ],
    ],
    'employee_activity' => [
        'kategori' => [
            EmployeeActivity::WEBINAR,
            EmployeeActivity::WORKSHOP,
            EmployeeActivity::SEMINAR,
            EmployeeActivity::EVENT,
            EmployeeActivity::LAINNYA,
        ],
    ],
    'meeting' => [
        'status' => [
            Meeting::SELESAI,
            Meeting::BELUM_MULAI,
        ],
    ],
];