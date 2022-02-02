<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'contactPage';
    protected $fillable = ['hotel_name', 'street', 'city', 'post_index', 'phone', 'fax', 'email', 'map', 'created_at', 'updated_at'];
}
