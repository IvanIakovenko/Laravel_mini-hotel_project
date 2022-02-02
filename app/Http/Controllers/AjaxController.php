<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;

class AjaxController extends Controller
{
    //
    public function index() 
    {
    	$photos = Carousel::all();
    	return $photos;
    }
}
