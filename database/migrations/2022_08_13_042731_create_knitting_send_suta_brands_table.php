<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnittingSendSutaBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knitting_send_suta_brands', function (Blueprint $table) {
            $table->id();
            $table->integer('knitting_send_id');
            $table->integer('name_of_suta');
            $table->integer('brand');
            $table->integer('kapor');
            $table->integer('weight');
            $table->integer('cartoon');
            $table->integer('rate');
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
        Schema::dropIfExists('knitting_send_suta_brands');
    }
}
