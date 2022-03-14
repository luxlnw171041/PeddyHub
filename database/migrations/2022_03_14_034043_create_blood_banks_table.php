<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pet_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('total_blood')->nullable();
            $table->string('location')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blood_banks');
    }
}
