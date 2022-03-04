<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('notula_id')->nullable();
            $table->string('pimpinan_rapat');
            $table->string('materi');
            $table->jsonb('daftar_hadir')->nullable();
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('tempat');
            $table->boolean('status');
            $table->string('dokumentasi')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}