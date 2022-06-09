<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LetterDispositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_dispositions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('letter_id');
            $table->string('pesan');
            $table->jsonb('tujuan');
            $table->jsonb('respon');
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
        //
    }
}
