<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingknittingMultipleReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makingknitting_multiple_receiveds', function (Blueprint $table) {
            $table->id();
            $table->integer('knitting_received_id');
            $table->integer('received_chalan_id');
            $table->integer('suta_id');
            $table->integer('brand_id');
            $table->integer('kapor_id');
            $table->integer('body');
            $table->string('rib');
            $table->string('color');
            $table->string('roll');
            $table->string('total');
            $table->string('total_used_lekra');
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
        Schema::dropIfExists('makingknitting_multiple_receiveds');
    }
}
