<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Rooms;
use App\Shedule;
use App\Booking;
use App\Shedule_for_Rooms;
use App\Mail\HotelMail;

class BookingController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth'); //посредники, это для всех методов если в конструкторе если в каком то одном тогда в нём надо писать
    }

    public function index() {
    	return view('lk');
    }

    public function show(Request $request) {

    	$rId = trim(htmlspecialchars($request->room));
    	$rooms = Rooms::all();
        $shedule = Shedule::all(); //Вернуть было
        /*$shedule2 = Shedule_for_Rooms::all();*/ //мой варинат для book2


        $allDates = DB::table('bookings')->pluck('shedule_id');
        $allShedule = DB::table('shedule')->pluck('id');

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


        //Второй варинат 
        $x = Rooms::find($request->room)->booking()->pluck('shedule_id');
        $shedule_dates = DB::table('Shedule')->whereNotIn('id', $x)->get();

        

        
      
        foreach ($rooms as $room) {
    		if($room->id == $rId){
    			return view('lk', ['test'=>$room, 'date' => $shedule_dates, 'today'=>$today, 'orders'=>$arr]); //Здесь было $shedule рабочий вариант 
    		}
    	}

      /* $room = Rooms::find('1');
        switch ($room) {
            case '1':
                $shedule_for_1 = DB::table('Shedule_room1')->where('status', false);
                return view('lk', ['test'=>$room, 'date' => $shedule_for_1]);
                break;
            
            default:
                # code...
                break;
        }*/
        
       
       

        
       

    }

    public function book(Request $request, Rooms $rooms) {
        /*$booked = new Booking;
        //$booked->user_id = 1;
        //$booked->user_id = $request->users();
        $booked->room_id = $request->room;
        $booked->shedule_id = $request->selectDates;
        $booked->status = true;
        $booked->save();*/

        /*$x = Rooms::find($request->room)->booking()->pluck('shedule_id');
        $shedule_dates = DB::table('Shedule')->whereIn('id', $x)->get();*/
       


        $number = $request->user()->booking()->create([
                    'room_id'=>$request->room,
                    'shedule_id'=>$request->selectDates,
                    'status'=>false 
                ]);

        /*ПОЧТА*/
        $text = 'Спасибо за бронирование номера, пожалуйста внесите предоплату в течении двух часов,
                иначе бронирование будет отменено.';
        $date = Shedule::find($request->selectDates);
        $room = Rooms::find($request->room);
        $id = $number->id;
        $email = Auth::user()->email;
        $data = (['text'=>$text, 'date'=>$date->date, 'room'=>$room->room_name, 'id'=>$id]);
        Mail::to($email)->send(new HotelMail($data));
        /******************/

        //return view('/lk');
        return redirect()->action('BookingController@show')->with('booked', 'Номер вашего бронирования '.$number->id.' на ваш имейл отправлено письмо, спасибо.');
        
    }

    public function book2(Request $request, Shedule_for_Rooms $shedule_for_rooms) {
        /*$booked = new Booking;
        //$booked->user_id = 1;
        //$booked->user_id = $request->users();
        $booked->room_id = $request->room;
        $booked->shedule_id = $request->selectDates;
        $booked->status = true;
        $booked->save();*/

        /*$dates = Shedule_for_Rooms::all();
        foreach ($dates->id as $value) {
            if($value == $request->selectDates)
            {
                $request->user()->booking2()->update([
                    'status'=>true,
                    'check'=>'booked'
                ]);                
            }
        }*/

        switch ($request->room) {
            case '1':
                $book = Shedule_for_Rooms::find($request->selectDates);
                if($book->status!=true)
                {
                    $book->user_id = auth()->id();
                    $book->status = true;
                    $book->check = 'booked';
                    $book->save();
                } else {
                    return redirect()->action('BookingController@show')->with('sorry', 'Извините выбранная дата '.$request->selectDates.' занята');
                   
                }
                break;
            
            default:
                # code...
                break;
        }

        $user = DB::table('shedule_room1')->where('id', $request->selectDates)->first();
        /*$request->user()->booking2()->update([
                    'status'=>true,
                    'check'=>'booked'
                ]); */


         /*if( $request->user()->booking()->find($request->selectDates ) ) {
            $shedule_for_rooms->update([
                'status'=>true,
                'check'=>'booked'
            ]);}*/

        /*$book = Shedule_for_Rooms::find($request->selectDates);
        $book->user_id = auth()->id();
        $book->status = true;
        $book->check = 'booked';
        $book->save();*/



            /*$request->user()->booking()->update([
            'status'=>true,
                'check'=>'booked'
        ]);*/

           /*DB::table('shedule_room1')
            ->where('id', $request->selectDates)
            ->update(['status' => true, 'check'=>'booked']);*/



           //$request->user()->booking()->where('id', $request->selectDates)->update(['status' => true, 'check'=>'booked']);

                   


        return redirect('/lk');
    }

}

