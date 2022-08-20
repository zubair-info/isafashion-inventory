<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingDyeingMultipleReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('making_dyeing_multiple_receiveds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('dyeing_send_id');
            $table->integer('received_chalan_id');
            $table->date('date');
            $table->string('color');
            $table->string('style');
            $table->string('lot_no');
            $table->string('body');
            $table->string('rib');
            $table->string('balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('making_dyeing_multiple_receiveds');
    }
}
