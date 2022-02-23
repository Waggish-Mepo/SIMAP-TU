<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('meeting_id');
            $table->string('notulis')->nullable();
            $table->integer('presensi')->nullable();
            $table->string('pembukaan')->nullable();
            $table->string('pembahasan_rapat')->nullable();
            $table->string('penutup')->nullable();
            $table->string('pokok_pembahasan')->nullable();
            $table->string('hasil_pembahasan')->nullable();
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
        Schema::dropIfExists('notulas');
    }
}