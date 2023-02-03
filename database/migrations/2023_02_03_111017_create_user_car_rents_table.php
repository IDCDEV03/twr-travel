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
        Schema::create('user_car_rents', function (Blueprint $table) {
            $table->id();
            $table->string('rent_id');
            $table->string('car_type');
            $table->string('start_province');
            $table->string('start_district');
            $table->string('start_place');
            $table->string('end_province');
            $table->string('end_district');
            $table->string('end_place');
            $table->date('start_travel');
            $table->date('back_travel');
            $table->string('car_for');
            $table->text('travel_detail');
            $table->string('travel_detail_file');
            $table->string('number_people');
            $table->string('number_of_car');
            $table->string('member_id');
            $table->string('member_name');
            $table->string('member_email');
            $table->string('member_company');
            $table->string('member_phone');
            $table->text('other_req');
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
        Schema::dropIfExists('user_car_rents');
    }
};
