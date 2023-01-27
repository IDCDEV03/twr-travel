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
        Schema::create('member_booking_packages', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->string('member_id');
            $table->string('member_name');
            $table->string('member_phone');
            $table->string('package_name');
            $table->integer('number_of_travel');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->text('member_detail');
            $table->string('member_contact');
            $table->integer('booking_status');
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
        Schema::dropIfExists('member_booking_packages');
    }
};
