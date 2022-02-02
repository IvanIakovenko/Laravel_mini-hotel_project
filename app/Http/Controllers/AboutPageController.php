<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutPageController extends Controller
{
    //
    public function index() {
    	$all = About::find(1);
    	return view('about', ['all'=>$all]);
    }
}
