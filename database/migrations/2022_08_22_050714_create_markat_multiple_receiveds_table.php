<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkatMultipleReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markat_multiple_receiveds', function (Blueprint $table) {
            $table->id();
            $table->integer('received_markat_id');
            $table->integer('kapor_id');
            $table->string('roll');
            $table->string('rate');
            $table->string('body');
            $table->string('balance');
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
        Schema::dropIfExists('markat_multiple_receiveds');
    }
}
