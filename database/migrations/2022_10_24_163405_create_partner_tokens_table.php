<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_partner')->nullable();
            $table->integer('partner_id')->nullable();
            $table->string('token')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_tokens');
    }
}
