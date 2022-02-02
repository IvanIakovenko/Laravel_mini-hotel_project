<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'shedule';
    protected $fillable = ['room_id', 'date'];
    public $timestamps = false;

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
