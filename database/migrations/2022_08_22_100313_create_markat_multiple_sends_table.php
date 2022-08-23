<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkatMultipleSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markat_multiple_sends', function (Blueprint $table) {
            $table->id();
            $table->integer('markat_send_id');
            $table->integer('send_chalan_id');
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
        Schema::dropIfExists('markat_multiple_sends');
    }
}
