<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuttingMultipleReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutting_multiple_receiveds', function (Blueprint $table) {
            $table->id();
            $table->integer('cutting_received_id');
            $table->integer('received_chalan_id');
            $table->integer('company_id');
            $table->date('date');
            $table->string('style');
            $table->string('lot_no');
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
        Schema::dropIfExists('cutting_multiple_receiveds');
    }
}
