<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'carousel';
    protected $fillable = ['images_path', 'created_at', 'updated_at'];
}
