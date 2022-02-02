<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Rooms;
use App\Shedule;
use App\Booking;
use DB;

class MainPageController extends Controller
{
    //
    public function index() {

      $dates = Shedule::all();
      date_default_timezone_set('Europe/Moscow');
      $today = date('Y-m-d');

    	if (Auth::check()) 
        {
           // The user is logged in...
           $name = Config::get('constants.admin');
           $admin = Auth::user();
           if($admin->name === $name)
           {
           return view('main', ['admin' => $admin, 'dates'=>$dates,'today'=>$today]);
           }
        }
    	return view('main', ['dates'=>$dates,'today'=>$today]);
    }

    public function checkRooms(Request $request) {
      //$x = Rooms::find($request->room)->booking()->pluck('shedule_id');

      date_default_timezone_set('Europe/Moscow');
      $today = date('Y-m-d');

      $selectedDate = Shedule::find($request->dates);
      $dates = Shedule::all();
      $allDates = DB::table('bookings')->where('shedule_id',$request->dates)->pluck('room_id');
      $freeRooms = DB::table('rooms')->whereNotIn('id', $allDates)->get();

      return view('main', ['all'=>$freeRooms, 'dates'=>$dates, 'selected'=>$selectedDate, 'today'=>$today]);
    }

    
}
