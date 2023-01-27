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
            $table->string('package_place')->after('package_name'); 
            $table->string('package_min_customer')->after('package_veh');
            $table->string('package_deposit')->after('package_file');            
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
