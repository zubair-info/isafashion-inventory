<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingKnittingReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('making_knitting_receiveds', function (Blueprint $table) {
            $table->id();
            $table->integer('send_chalan_id');
            $table->date('date');
            $table->integer('suta_id');
            $table->integer('brand_id');
            $table->integer('kapor_id');
            $table->integer('received_chalan_id');
            $table->integer('body');
            $table->float('rib');
            $table->string('color');
            $table->float('roll');
            $table->float('total');
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
        Schema::dropIfExists('making_knitting_receiveds');
    }
}
