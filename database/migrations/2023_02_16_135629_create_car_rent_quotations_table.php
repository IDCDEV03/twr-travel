<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_rent_quotations', function (Blueprint $table) {
            $table->id();
            $table->string('rent_id');
            $table->string('car_quotation');
            $table->string('total_price');
            $table->string('price_deposit');
            $table->string('car_quotation_detail');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_rent_quotations');
    }
};
