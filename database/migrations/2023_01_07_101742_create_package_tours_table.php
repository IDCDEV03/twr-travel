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
        Schema::create('package_tours', function (Blueprint $table) {
            $table->id();
            $table->string('package_id');
            $table->string('package_name');
            $table->string('package_type');
            $table->string('code_tour');
            $table->string('package_veh');
            $table->string('package_total_day');
            $table->string('package_price');
            $table->string('package_file');
            $table->text('package_detail');            
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
        Schema::dropIfExists('package_tours');
    }
};
