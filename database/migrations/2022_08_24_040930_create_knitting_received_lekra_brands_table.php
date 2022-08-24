<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnittingReceivedLekraBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knitting_received_lekra_brands', function (Blueprint $table) {
            $table->id();
            $table->integer('send_chalan_id');
            $table->date('date');
            $table->integer('company_id');
            $table->integer('lekra_brand_id');
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
        Schema::dropIfExists('knitting_received_lekra_brands');
    }
}
