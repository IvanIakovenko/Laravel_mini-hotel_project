<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Rooms;
use App\Shedule;
use App\Booking;



class LkPageController extends Controller
{
    //
    public function index() {
    	$dates = Shedule::all();
      date_default_timezone_set('Europe/Moscow');
        //$date = date('m/d/Y h:i:s a', time());
      $today = date('Y-m-d');

      $orders = Auth::user()->booking()->get();
      $arr = [];
      foreach ($orders as $order) {
        $allDates = Shedule::find($order->shedule_id);
        $allRooms = Rooms::find($order->room_id);
        $arr[] = $allDates;
        $arr[] = $allRooms;
      }
    	return view('lk', ['dates'=>$dates, 'today'=>$today, 'orders'=>$arr]);
    }

    public function bookingFromLk(Request $request) {
      //$x = Rooms::find($request->room)->booking()->pluck('shedule_id');
      $dates = Shedule::all();
      $allDates = DB::table('bookings')->where('shedule_id',$request->dates)->pluck('room_id');
      $freeRooms = DB::table('rooms')->whereNotIn('id', $allDates)->get();

      $dates = Shedule::all();
      date_default_timezone_set('Europe/Moscow');
        //$date = date('m/d/Y h:i:s a', time());
      $today = date('Y-m-d');

      $selectedDate = Shedule::find($request->dates);
      $datesId = $request->dates;

      return view('lk', ['all'=>$freeRooms, 'dates'=>$dates, 'today'=>$today, 'selected'=>$selectedDate, 'datesId'=>$datesId]);
    }
}
