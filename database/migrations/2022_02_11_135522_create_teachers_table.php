<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('subject_id');
            $table->integer('nuptk');
            $table->integer('nik');
            $table->integer('no_induk_yayasan');
            $table->string('no_ukg');
            $table->string('jk_teacher');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir_teacher');
            $table->string('nama_ibu_kandung');
            $table->string('alamat_jalan');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('dusun');
            $table->string('kelurahan_desa');
            $table->string('kecamatan');
            $table->integer('kode_pos');
            $table->string('agama');
            $table->string('kewaraganegaraan');
            $table->string('npwp');
            $table->string('nama_wajib_pajak');
            $table->string('status_perkawinan');
            $table->integer('nip_suami_istri');
            $table->string('pekerjaan_suami_istri');
            $table->string('status_kepegawaian');
            $table->string('jenis_ptk');
            $table->string('sk_pengangkatan');
            $table->string('tmt_pengangkatan');
            $table->string('lembaga_pengangkatan');
            $table->string('sk_cpns');
            $table->string('tmt_pns');
            $table->string('pangkat_gologan');
            $table->string('sumber_gaji');
            $table->string('kartu_pegawai');
            $table->string('kartu_suami_istri');
            $table->string('lisensi_kepala_sekolah');
            $table->integer('no_registrasi_nuks');
            $table->string('keahlian_laboratorium');
            $table->string('mampu_menangani_kebutuhan_khusus');
            $table->string('keahlian_braile');
            $table->string('keahlian_bahasa_isyarat');
            $table->integer('no_telp_rumah');
            $table->integer('no_hp');
            $table->string('email');
            $table->integer('no_surat_tugas');
            $table->date('tgl_sura_tugas');
            $table->string('tmt_tugas');
            $table->string('status_sekolah_induk');
            $table->string('jenis_sertifikasi');
            $table->integer('no_sertifikasi');
            $table->integer('tahun_sertifikasi');
            $table->string('bidang_studi_sertifikasi');
            $table->integer('nrg_sertifikasi');
            $table->integer('no_peserta_sertifikasi');
            $table->string('jenjang_pendidikan');
            $table->string('gelar_akademik');
            $table->string('satuan_pendidikan');
            $table->integer('tahun_masuk_pendidikan');
            $table->integer('tahun_keluar_pendidikan');
            $table->integer('no_induk');
            $table->integer('ipk');
            $table->string('nama_anak');
            $table->string('status');
            $table->string('jenjang_pendidikan_anak');
            $table->integer('nisn');
            $table->string('jk_anak');
            $table->string('tempat_lahir_anak');
            $table->date('tgl_lahir_anak');
            $table->integer('tahun_masuk_anak');
            $table->string('rules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
