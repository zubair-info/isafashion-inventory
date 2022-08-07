<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingKnittingSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('making_knitting_sends', function (Blueprint $table) {
            $table->id();
            $table->integer('send_chalan_id');
            $table->date('date');
            $table->integer('name_of_suta');
            $table->integer('brand');
            $table->integer('kapor');
            $table->integer('weight');
            $table->integer('cartoon');
            $table->integer('rate');
            $table->string('lekra_brand');
            $table->string('lekra_cartoon');
            $table->integer('lekra_rate');
            $table->string('send_company_name');
            // $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('making_knitting_sends');
    }
}
