<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('disposition_id')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('jenis');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_terima')->nullable();
            $table->string('perihal');
            $table->string('sifat');
            $table->string('lampiran')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('letters');
    }
}
