<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contactPage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_name');
            $table->string('street');
            $table->string('city');
            $table->string('post_index');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('contactPage');
    }
}
