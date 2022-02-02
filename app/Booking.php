<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'bookings';
    protected $fillable = ['user_id', 'room_id', 'shedule_id', 'status', 'created_at', 'updated_at'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function room() {
    	return $this->belongsToMany(Rooms::class);
    }

    public function shedules() {
    	return $this->hasMany(Shedule::class);
    }
}
