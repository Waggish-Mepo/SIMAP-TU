<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // status pegawai
    const PNS = 'PNS';
    const PNS_Depang = 'PNS Depang';
    const PNS_Diperbantukan = 'PNS Diperbantukan';
    const GTY = 'GTY';
    const PTT_Provinsi = 'PTT Provinsi';
    const PTT_kab_kota = 'PTT Kab Kota';
    const Guru_Bantu_Pusat = 'Guru Bantu Pusat';
    const Guru_Honor = 'Guru Honor';
    const Tenaga_Honor = 'Tenaga Honor';
    const CPNS = 'CPNS';

    // jenis ptk
    const Guru_kelas = 'Guru Kelas';
    const Guru_mapel = 'Guru Mapel';
    const Guru_BK = 'Guru BK';
    const Guru_Inklusi = 'Guru Inklusi';
    const Tenaga_Administrasi_Sekolah = 'Tenaga Administrasi Sekolah';
    const Guru_Pendamping = 'Guru Pendamping';
    const Guru_Magang = 'Guru Magang';
    const Guru_TIK = 'Guru TIK';
    const Kepala_Sekolah = 'Kepala Sekolah';
    const Laboran = 'Laboran';
    const Pustakawan = 'Pustakawan';

    // Lembaga Pengangkat
    const Pemerintah_Pusat = 'Pemerintah Pusat';
    const Pemerintah_Provinsi = 'Pemerintah Provinsi';
    const Pemerintah_Kota = 'Pemerintah Kota';
    const Ketua_Yayasan = 'Ketua Yayasan';
    const Komite_Sekolah = 'Komite Sekolah';

    // Sumber Gaji
    const APBN = 'APBN';
    const APBD_Provinsi = 'APBD Provinsi';
    const APBD_Kota = 'APBD Kota';
    const Yayasan = 'Yayasan';
    const Sekolah = 'Sekolah';
    const Lembaga_Donor = 'Lembaga Donor';

    public $incrementing = false;

    protected $casts = [
        'tmt_pengangkatan' => 'datetime:d/m/Y',
        'tmt_pns' => 'datetime:d/m/Y',
    ];
}
