<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLostPetByJs100ToLostPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lost__pets', function (Blueprint $table) {
            $table->string('photo_link')->nullable();
            $table->string('pet_name')->nullable();
            $table->string('pet_age')->nullable();
            $table->string('pet_gender')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lost__pets', function (Blueprint $table) {
            //
        });
    }
}
