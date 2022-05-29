<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->bigInteger('niy_nigk')->nullable();
            $table->bigInteger('nuptk')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->date('tmt_pengangkatan')->nullable();
            $table->string('lembaga_pengangkatan')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->date('tmt_pns')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->integer('kartu_pegawai')->nullable();
            $table->string('kartu_suami')->nullable();
            $table->string('kartu_istri')->nullable();
            $table->bigInteger('ktp')->nullable();
            $table->bigInteger('kk')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
