<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
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
            $table->string('jk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('alamat_jalan')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan_desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewaraganegaraan')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->integer('nip_suami_istri')->nullable();
            $table->string('pekerjaan_suami_istri')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('tmt_pengangkatan')->nullable();
            $table->string('lembaga_pengangkatan')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('tmt_pns')->nullable();
            $table->string('pangkat_gologan')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('kartu_pegawai')->nullable();
            $table->string('kartu_suami_istri')->nullable();
            $table->string('lisensi_kepala_sekolah')->nullable();
            $table->integer('no_registrasi_nuks')->nullable();
            $table->string('keahlian_laboratorium')->nullable();
            $table->string('mampu_menangani_kebutuhan_khusus')->nullable();
            $table->string('keahlian_braile')->nullable();
            $table->string('keahlian_bahasa_isyarat')->nullable();
            $table->integer('no_telp_rumah')->nullable();
            $table->integer('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->integer('no_surat_tugas')->nullable();
            $table->date('tgl_sura_tugas')->nullable();
            $table->string('tmt_tugas')->nullable();
            $table->string('status_sekolah_induk')->nullable();
            $table->string('jenis_sertifikasi')->nullable();
            $table->integer('no_sertifikasi')->nullable();
            $table->integer('tahun_sertifikasi')->nullable();
            $table->string('bidang_studi_sertifikasi')->nullable();
            $table->integer('nrg_sertifikasi')->nullable();
            $table->integer('no_peserta_sertifikasi')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->string('satuan_pendidikan')->nullable();
            $table->integer('tahun_masuk_pendidikan')->nullable();
            $table->integer('tahun_keluar_pendidikan')->nullable();
            $table->integer('no_induk')->nullable();
            $table->integer('ipk')->nullable();
            $table->string('nama_anak')->nullable();
            $table->string('status')->nullable();
            $table->string('jenjang_pendidikan_anak')->nullable();
            $table->integer('nisn')->nullable();
            $table->string('jk_anak')->nullable();
            $table->string('tempat_lahir_anak')->nullable();
            $table->date('tgl_lahir_anak')->nullable();
            $table->integer('tahun_masuk_anak')->nullable();
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
