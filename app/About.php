<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'about';
    protected $fillable = ['main_img', 'big_name', 'type_name', 'short_text', 'description_one', 'description_two', 'description_three','sml_img1', 'sml_img2', 'sml_img3', 'created_at', 'updated_at'];
}
