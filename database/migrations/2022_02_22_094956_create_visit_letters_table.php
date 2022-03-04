<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_letters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_surat');
            $table->string('lampiran');
            $table->string('perihal');
            $table->string('kepada');
            $table->string('hari');
            $table->date('tanggal');
            $table->string('jam');
            $table->string('tempat');
            $table->integer('jumlah_peserta');
            $table->string('dokumentasi');
            $table->string('keterangan');
            $table->string('status');
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
        Schema::dropIfExists('visit_letters');
    }
}
