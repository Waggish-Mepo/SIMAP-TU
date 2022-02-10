<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('subject_id');
            $table->integer('ph1');
            $table->integer('ph2');
            $table->integer('pts_ganjil');
            $table->integer('ph3');
            $table->integer('ph4');
            $table->integer('pas_ganjil');
            $table->integer('ph5');
            $table->integer('ph6');
            $table->integer('pas_genap');
            $table->integer('ph7');
            $table->integer('ph8');
            $table->integer('pat');
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
        Schema::dropIfExists('scores');
    }
}
