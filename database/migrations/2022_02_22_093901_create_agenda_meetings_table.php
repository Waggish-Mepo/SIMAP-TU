<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_meetings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('meeting_id');
            $table->string('narasumber')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempat')->nullable();
            $table->jsonb('waktu')->nullable();
            $table->jsonb('acara')->nullable();
            $table->jsonb('pengisi_acara')->nullable();
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
        Schema::dropIfExists('agenda_meetings');
    }
}