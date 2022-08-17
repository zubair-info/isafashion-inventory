<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingDyeingMultipleSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('making_dyeing_multiple_sends', function (Blueprint $table) {
            $table->id();
            $table->integer('dyeing_send_id');
            $table->integer('received_chalan_id');
            $table->string('color');
            $table->string('roll');
            $table->string('body');
            $table->string('rib');
            $table->string('total');
            $table->string('lost_percentage');
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
        Schema::dropIfExists('making_dyeing_multiple_sends');
    }
}
