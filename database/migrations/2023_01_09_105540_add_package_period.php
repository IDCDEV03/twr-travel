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
        Schema::table('package_tours', function (Blueprint $table) {
            $table->string('package_period_start')->after('package_total_day'); 
            $table->string('package_period_end')->after('package_price'); 
            $table->string('package_status')->after('package_detail'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_tours', function (Blueprint $table) {
            //
        });
    }
};
