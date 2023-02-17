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
        Schema::create('car_rental_payments', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('code_pay');
            $table->string('rent_id');
            $table->string('payment_price');
            $table->string('payment_bank');
            $table->string('payment_slip');
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
        Schema::dropIfExists('car_rental_payments');
    }
};
