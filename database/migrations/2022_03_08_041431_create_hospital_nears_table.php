<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHospitalNearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_nears', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('business_hours')->nullable();
            $table->string('phone')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospital_nears');
    }
}
