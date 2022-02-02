<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Config;
use App\Rooms;
use App\Shedule;
use App\Booking;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::check())
        {
            return redirect('/');
        }

        $rooms = Rooms::all();

        if (Auth::check()) 
        {
           // The user is logged in...
           $name = Config::get('constants.reception');
           $administrator = Auth::user();
           if($administrator->name === $name)
           {
            $booking = Booking::all();

            $dates = Shedule::all();
            date_default_timezone_set('Europe/Moscow');
            //$date = date('m/d/Y h:i:s a', time());
            $today = date('Y-m-d');

            return view('reception', ['dates'=>$dates, 'today'=>$today, 'booking'=>$booking]);
           }
        }

       
    
        //return view('reception', ['dates'=>$dates, 'today'=>$today, 'booking'=>$booking]);
    }

    public function booking(Request $request) {
      //$x = Rooms::find($request->room)->booking()->pluck('shedule_id');
      $dates = Shedule::all();
      $allDates = DB::table('bookings')->where('shedule_id',$request->dates)->pluck('room_id');
      $freeRooms = DB::table('rooms')->whereNotIn('id', $allDates)->get();
      $booking = Booking::all();

      $dates = Shedule::all();
      date_default_timezone_set('Europe/Moscow');
        //$date = date('m/d/Y h:i:s a', time());
      $today = date('Y-m-d');
      $choosenDate = $request->dates;

      $selectedDate = Shedule::find($request->dates);

      return view('reception', ['all'=>$freeRooms, 'dates'=>$dates, 'today'=>$today, 'bookDate'=>$choosenDate, 'booking'=>$booking, 'selDate'=>$selectedDate]);
    }

    public function book(Request $request, Rooms $rooms) {
       
        $number = $request->user()->booking()->create([
            'room_id'=>$request->room,
            'shedule_id'=>$request->selectDates,
            'status'=>true 
        ]);

        //return view('/lk');
        return redirect()->action('ReceptionController@index')->with('booked', 'Забронирован номер '.$request->room_name .' с номером бронирования= '.$number->id);
        
    }

    public function search(Request $request) {
        $sId = $request->searchInp;
        $foundId = Booking::find($sId);
        $dateId = Shedule::find($foundId->shedule_id);
        $roomId = Rooms::find($foundId->room_id);
        return view('reception', ['foundId'=>$foundId, 'dateId'=>$dateId, 'roomId'=>$roomId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $id)
    {
        //
        if($id->status != true)
        {
            $id->status = true;
            $id->save();
            return redirect()->action('ReceptionController@index')->with('updated', 'Статус бронирования '.$id->id.' обнавлён');
        }
    }
    public function delete(Request $request, Booking $id)
    {
        $user = Auth::user();
        /*if($user->name === 'Администратор')
        {
            if( $request->user()->booking()->find($id) ){
                $id->delete();
                return redirect()->action('ReceptionController@index')->with('canceled', 'Бронирование '.$id->id.' отменено');
            }
        }*/

        $user2 = $request->user();
        if($user2->name ==='Администратор'){
            
            $id->delete();
            return redirect()->action('ReceptionController@index')->with('canceled', 'Бронирование '.$id->id.' отменено');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
