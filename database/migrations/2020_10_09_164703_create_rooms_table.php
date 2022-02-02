<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_img')->default('Sorry, image not added');
            $table->string('room_name',200);
            $table->string('room_bed',200);
            $table->string('room_bath',200);
            $table->string('room_media',200);
            $table->string('sml_img1')->default('Sorry, image not added');
            $table->string('sml_img2')->default('Sorry, image not added');
            $table->string('sml_img3')->default('Sorry, image not added');
            $table->string('sml_img4')->default('Sorry, image not added');
            $table->string('sml_img5')->default('Sorry, image not added');
            $table->string('sml_img6')->default('Sorry, image not added');
            $table->string('sml_img7')->default('Sorry, image not added');
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
        Schema::drop('rooms');
    }
}
