<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnittingReceivedSutaBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knitting_received_suta_brands', function (Blueprint $table) {
            $table->id();
            $table->integer('send_chalan_id');
            $table->date('date');
            $table->integer('suta_id');
            $table->integer('brand_id');
            $table->integer('kapor_id');
            $table->string('weight');
            $table->string('cartoon');
            $table->string('rate');
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
        Schema::dropIfExists('knitting_received_suta_brands');
    }
}
