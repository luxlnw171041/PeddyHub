<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdoptpetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptpets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titel')->nullable();
            $table->string('detail')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('gender');
            $table->string('size');
            $table->string('age');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adoptpets');
    }
}
