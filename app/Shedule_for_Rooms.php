<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule_for_Rooms extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'shedule_room1';
    protected $fillable = ['room_id', 'user_id', 'date', 'status', 'check', 'created_at', 'updated_at'];

    
}
