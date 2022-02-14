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
            $table->uuid('student_group_id');
            $table->uuid('region_id');
            $table->integer('nis');
            $table->integer('nisn');
            $table->integer('nik');
            $table->string('nama');
            $table->string('jk');
            $table->integer('no_kartu_keluarga');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->integer('no_regis_akta_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('berkebutuhan_khusus');
            $table->string('alamat_jalan');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('dusun');
            $table->string('kelurahan_desa');
            $table->string('kecamatan');
            $table->integer('kode_pos');
            $table->string('lintang');
            $table->string('bujur');
            $table->string('tempat_tinggal');
            $table->string('moda_transportasi');
            $table->integer('anak_ke');
            $table->boolean('punya_kip');
            $table->integer('nomor_kip');
            $table->integer('no_hp_siswa');
            $table->string('email_siswa');
            $table->integer('no_telp_rumah');
            $table->date('tgl_masuk_sekolah');
            $table->string('sekolar_asal');
            $table->integer('no_peserta_un_smp');
            $table->integer('no_seri_ijazah_smp');
            $table->integer('no_seri_shun_smp');
            $table->string('nama_ayah_kandung');
            $table->integer('nik_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_perbulan_ayah');
            $table->string('berkebutuhan_khusus_ayah');
            $table->integer('no_hp_ayah');
            $table->string('email_ayah');
            $table->string('nama_ibu_kandung');
            $table->integer('nik_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_perbulan_ibu');
            $table->string('berkebutuhan_khusus_ibu');
            $table->integer('no_hp_ibu');
            $table->string('email_ibu');
            $table->string('nama_wali');
            $table->integer('nik_wali');
            $table->string('tempat_lahir_wali');
            $table->date('tgl_lahir_wali');
            $table->string('pendidikan_wali');
            $table->string('pekerjaan_wali');
            $table->string('penghasilan_perbulan');
            $table->string('berkebutuhan_khusus_wali');
            $table->integer('no_hp_wali');
            $table->string('email_wali');
            $table->integer('tinggi_badan_siswa');
            $table->integer('berat_badan_siswa');
            $table->integer('lingkar_kepala');
            $table->string('jarak_tempat_tinggal_kesekolah');
            $table->integer('sebutkan_jarak');
            $table->string('waktu_tempuh_kesekolah');
            $table->integer('jumlah_saudara_kandung');
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
        Schema::dropIfExists('students');
    }
}
