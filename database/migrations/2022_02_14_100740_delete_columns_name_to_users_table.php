<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnsNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) { 
            $table->dropColumn('name');  
            $table->dropColumn('provider');  
            $table->dropColumn('phone');  
            $table->dropColumn('birth');  
            $table->dropColumn('sex');  
            $table->dropColumn('photo');  
            $table->dropColumn('type');  
            $table->dropColumn('language');  
            $table->string('ip_address')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
