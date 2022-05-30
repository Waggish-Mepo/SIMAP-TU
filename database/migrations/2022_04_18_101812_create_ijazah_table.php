<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjazahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijazah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('employee_id');
            $table->string('nomor');
            $table->string('jurusan');
            $table->string('nama_sekolah');
            $table->string('npsn');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('nama_ortu');
            $table->integer('nis');
            $table->bigInteger('nisn');
            $table->string('no_peserta_un');
            $table->string('ijazah');
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
        Schema::dropIfExists('ijazah');
    }
}
