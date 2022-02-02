<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rooms;

class RoomsController extends Controller
{
    //
    /*public function __construct() {
        $this->middleware('auth'); //посредники, это для всех методов если в конструкторе если в каком то одном тогда в нём надо писать
    }*/

    public function index() {
    	$rooms = Rooms::all();
    	

    	return view('rooms', ['rooms' => $rooms]);
    }
}
