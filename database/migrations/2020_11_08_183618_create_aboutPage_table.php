<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_img')->default('Sorry, image not added');
            $table->string('big_name',200);
            $table->string('type_name',200);
            $table->string('short_text',500);
            $table->text('description_one');
            $table->text('description_two');
            $table->text('description_three');
            $table->string('sml_img1')->default('Sorry, image not added');
            $table->string('sml_img2')->default('Sorry, image not added');
            $table->string('sml_img3')->default('Sorry, image not added');
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
        Schema::drop('about');
    }
}
