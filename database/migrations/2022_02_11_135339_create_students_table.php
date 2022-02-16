<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->uuid('student_group_id');
            $table->uuid('region_id');
            $table->integer('nis');
            $table->integer('nisn');
            $table->integer('nik');
            $table->string('jk')->nullable();
            $table->integer('no_kartu_keluarga')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('no_regis_akta_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('berkebutuhan_khusus')->nullable();
            $table->string('alamat_jalan')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan_desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('moda_transportasi')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->boolean('punya_kip')->nullable();
            $table->integer('nomor_kip')->nullable();
            $table->integer('no_hp_siswa')->nullable();
            $table->string('email_siswa')->nullable();
            $table->integer('no_telp_rumah')->nullable();
            $table->date('tgl_masuk_sekolah')->nullable();
            $table->string('sekolar_asal')->nullable();
            $table->integer('no_peserta_un_smp')->nullable();
            $table->integer('no_seri_ijazah_smp')->nullable();
            $table->integer('no_seri_shun_smp')->nullable();
            $table->string('nama_ayah_kandung')->nullable();
            $table->integer('nik_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_perbulan_ayah')->nullable();
            $table->string('berkebutuhan_khusus_ayah')->nullable();
            $table->integer('no_hp_ayah')->nullable();
            $table->string('email_ayah')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->integer('nik_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_perbulan_ibu')->nullable();
            $table->string('berkebutuhan_khusus_ibu')->nullable();
            $table->integer('no_hp_ibu')->nullable();
            $table->string('email_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->integer('nik_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_perbulan')->nullable();
            $table->string('berkebutuhan_khusus_wali')->nullable();
            $table->integer('no_hp_wali')->nullable();
            $table->string('email_wali')->nullable();
            $table->integer('tinggi_badan_siswa')->nullable();
            $table->integer('berat_badan_siswa')->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->string('jarak_tempat_tinggal_kesekolah')->nullable();
            $table->integer('sebutkan_jarak')->nullable();
            $table->string('waktu_tempuh_kesekolah')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
