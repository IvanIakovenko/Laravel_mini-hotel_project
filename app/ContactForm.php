<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'contact';
    protected $fillable = ['name', 'phone', 'email', 'text', 'created_at', 'updated_at'];
}
