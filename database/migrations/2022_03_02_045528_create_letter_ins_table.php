<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_ins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('perihal');
            $table->string('sifat');
            $table->string('lampiran')->nullable();
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
        Schema::dropIfExists('letter_ins');
    }
}