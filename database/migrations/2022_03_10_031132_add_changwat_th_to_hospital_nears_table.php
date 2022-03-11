<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangwatThToHospitalNearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_nears', function (Blueprint $table) {
            $table->string('tambon_th')->nullable();
            $table->string('amphoe_th')->nullable();
            $table->string('changwat_th')->nullable();
            $table->string('recommend')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_nears', function (Blueprint $table) {
            //
        });
    }
}
