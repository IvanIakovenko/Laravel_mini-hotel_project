<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'rooms';
    protected $fillable = ['main_img', 'room_name', 'room_bed', 'room_bath', 'room_media', 'room_price', 'sml_img1', 'sml_img2', 'sml_img3', 'sml_img4', 'sml_img5', 'sml_img6', 'sml_img7', 'created_at', 'updated_at'];
   
   public function booking() {
        return $this->hasMany(Booking::class, 'room_id');
    }
}
