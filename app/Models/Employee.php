<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // status pegawai
    const PNS = 'PNS';
    const PNS_Depang = 'PNS_Depang';
    const PNS_Diperbantukan = 'PNS_Diperbantukan';
    const GTY = 'GTY';
    const PTT_Provinsi = 'PTT_Provinsi';
    const PTT_kab_kota = 'PTT_kab_kota';
    const Guru_Bantu_Pusat = 'Guru_Bantu_Pusat';
    const Guru_Honor = 'Guru_Honor';
    const Tenaga_Honor = 'Tenaga_Honor';
    const CPNS = 'CPNS';

    // jenis ptk
    const Guru_kelas = 'Guru_kelas';
    const Guru_mapel = 'Guru_mapel';
    const Guru_BK = 'Guru_BK';
    const Guru_Inklusi = 'Guru_Inklusi';
    const Tenaga_Administrasi_Sekolah = 'Tenaga_Administrasi_Sekolah';
    const Guru_Pendamping = 'Guru_Pendamping';
    const Guru_Magang = 'Guru_Magang';
    const Guru_TIK = 'Guru_TIK';
    const Kepala_Sekolah = 'Kepala_Sekolah';
    const Laboran = 'Laboran';
    const Pustakawan = 'Pustakawan';

    // Lembaga Pengangkat
    const Pemerintah_Pusat = 'Pemerintah_Pusat';
    const Pemerintah_Provinsi = 'Pemerintah_Provinsi';
    const Pemerintah_Kota = 'Pemerintah_Kota';
    const Ketua_Yayasan = 'Ketua_Yayasan';
    const Komite_Sekolah = 'Komite_Sekolah';

    // Sumber Gaji
    const APBN = 'APBN';
    const APBD_Provinsi = 'APBD_Provinsi';
    const APBD_Kota = 'APBD_Kota';
    const Yayasan = 'Yayasan';
    const Sekolah = 'Sekolah';
    const Lembaga_Donor = 'Lembaga_Donor';

    public $incrementing = false;

    protected $table = 'employee';

    protected $fillable = [
        'id',
        'nama',
        'status_pegawai',
        'nip',
        'nigk',
        'nuptk',
        'jenis_ptk',
        'sk_pengangkatan',
        'tmt_pengangkatan',
        'lembaga_pengangkatan',
        'sk_cpns',
        'tmt_pns',
        'pangkat',
        'sumber_gaji',
        'kartu_pegawai',
        'kartu_suami',
        'kartu_istri',
        'ktp',
        'kk',
    ];
}