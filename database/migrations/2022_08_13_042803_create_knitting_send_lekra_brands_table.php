<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnittingSendLekraBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knitting_send_lekra_brands', function (Blueprint $table) {
            $table->id();
            $table->integer('knitting_send_id');
            $table->string('lekra_brand');
            $table->string('lekra_cartoon');
            $table->string('lekra_rate');
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
        Schema::dropIfExists('knitting_send_lekra_brands');
    }
}
