<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Rooms;
use App\ContactPage;
use App\Shedule;
use App\Carousel;
use App\Shedule_for_Rooms;
use App\About;

class ConsoleController extends Controller
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

        if (Auth::check()) 
        {
           // The user is logged in...
           $name = Config::get('constants.admin');
           $admin = Auth::user();
           if($admin->name === $name)
           {
             $carouselPhotos = Carousel::all(); //фото карусели
             $allRoomsIds = Rooms::pluck('id');
             $contactInfo = ContactPage::find(1);
             $aboutPage = About::find(1);
             $shedule = Shedule::all();
             return view('admin', ['carPhotos'=>$carouselPhotos, 'ids'=>$allRoomsIds, 'contact'=>$contactInfo, 'about'=>$aboutPage, 'shedule'=>$shedule]);
           }
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //СОЗДАЁМ РАСПИСАНИЕ
        $shedule = new Shedule;
        $shedule->room_id = $request->room_id;
        $shedule->date = $request->date;
        $shedule->save();

        return redirect()->action('ConsoleController@index')->with('message3', 'Расписание для номера '.$shedule->room_id .' has been added with id='.$shedule->id);


    }

    public function create2(Request $request)
    {
        //СОЗДАЁМ РАСПИСАНИЕ
        $room1 = new Shedule_for_Rooms;
        $room1->room_id = $request->room_id;
        $room1->date = $request->date;
        $room1->status = false;
        /*$room1->check = 'free';*/
        $room1->save();

        return redirect()->action('ConsoleController@index')->with('message5', 'Расписание для номера '.$room1->room_id .' has been added with id='.$room1->id);


    }

    public function createCarousel(Request $request)
    {
        $carousel = new Carousel;
        $image = $request->file('car_img');

        if($image != null)
        {
            $img = $request->file('car_img')->getClientOriginalName();
            $request->file('car_img')->move(public_path().'/images/carousel/',$img);
            $carousel->images_path = '/images/carousel/'.$img;
        } else {
            $carousel->images_path = '';
        }

        $carousel->save();

        return redirect()->action('ConsoleController@index')->with('message4', 'Изображение '.$carousel->images_path.' has been added with id='.$carousel->id);
    }

    public function updateCarousel(Request $request, Carousel $id) {
        $updPhoto = $request->file('car_img');

        if($updPhoto != null)
        {
            $img = $request->file('car_img')->getClientOriginalName();
            $request->file('car_img')->move(public_path().'/images/carousel/',$img);
            $id->images_path = '/images/carousel/'.$img;
        } else {
            $id->images_path = $id->images_path;
        }
        
        $id->save();

        //return view('fff', ['ff'=>$updPhoto]);

        return redirect()->action('ConsoleController@index')->with('updatedCar', 'Изображение '.$id->images_path.' has been added with id='.$id->id);
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
        $room = new Rooms;
        $main_img = $request->file('main_img');
        $sml_img1 = $request->file('sml_img1');
        $sml_img2 = $request->file('sml_img2');
        $sml_img3 = $request->file('sml_img3');
        $sml_img4 = $request->file('sml_img4');
        $sml_img5 = $request->file('sml_img5');
        $sml_img6 = $request->file('sml_img6');
        $sml_img7 = $request->file('sml_img7');

        if($main_img != null && $sml_img1 != null && $sml_img2 != null && $sml_img3 != null && $sml_img4 != null && $sml_img5 != null && $sml_img6 != null && $sml_img7 != null) 
        {
            $main = $request->file('main_img')->getClientOriginalName();
            $sml1 = $request->file('sml_img1')->getClientOriginalName();
            $sml2 = $request->file('sml_img2')->getClientOriginalName();
            $sml3 = $request->file('sml_img3')->getClientOriginalName();
            $sml4 = $request->file('sml_img4')->getClientOriginalName();
            $sml5 = $request->file('sml_img5')->getClientOriginalName();
            $sml6 = $request->file('sml_img6')->getClientOriginalName();
            $sml7 = $request->file('sml_img7')->getClientOriginalName();

            $request->file('main_img')->move(public_path().'/images',$main);
            $request->file('sml_img1')->move(public_path().'/images',$sml1);
            $request->file('sml_img2')->move(public_path().'/images',$sml2);
            $request->file('sml_img3')->move(public_path().'/images',$sml3);
            $request->file('sml_img4')->move(public_path().'/images',$sml4);
            $request->file('sml_img5')->move(public_path().'/images',$sml5);
            $request->file('sml_img6')->move(public_path().'/images',$sml6);
            $request->file('sml_img7')->move(public_path().'/images',$sml7);
           
            $room->main_img='/images/'.$main;
            $room->sml_img1='/images/'.$sml1;
            $room->sml_img2='/images/'.$sml2;
            $room->sml_img3='/images/'.$sml3;
            $room->sml_img4='/images/'.$sml4;
            $room->sml_img5='/images/'.$sml5;
            $room->sml_img6='/images/'.$sml6;
            $room->sml_img7='/images/'.$sml7;


            
        } else {
            
            $room->main_img='';
            $room->sml_img1='';
            $room->sml_img2='';
            $room->sml_img3='';
            $room->sml_img4='';
            $room->sml_img5='';
            $room->sml_img6='';
            $room->sml_img7='';
        }

        $room->room_name=$request->room_name;
        $room->room_bed=$request->room_bed;
        $room->room_bath=$request->room_bath;
        $room->room_media=$request->room_media;
        $room->room_price=$request->room_price;

        $room->save();

        return redirect()->action('ConsoleController@index')->with('message', 'New room '.$room->room_name.' has been added with id='.$room->id);
    }

    public function getRoomForUpdate(Request $request) {
        $room = Rooms::find($request->selectedRoom);
        //$roomSmlImg = Rooms::find($request->selectedRoom)->select('sml_img1','sml_img2','sml_img3','sml_img4','sml_img5','sml_img6','sml_img7')->get();
        //return redirect()->action('ConsoleController@index', ['roomForUpd'=>$room]);
        
        $carouselPhotos = Carousel::all(); //фото карусели
        $allRoomsIds = Rooms::pluck('id');
        $contactInfo = ContactPage::find(1);
        $option = $request->selectedRoom;
        return view('/admin', ['carPhotos'=>$carouselPhotos, 'ids'=>$allRoomsIds, 'roomForUpd'=>$room, 'contact'=>$contactInfo, 'option'=>$option]);

    }

    public function updateRooms(Request $request, Rooms $id) {

       /* $room = Rooms::where('id', 1)
              ->update([
                        'room_name' => $request->room_name,
                        'room_bed' => $request->room_bed,
                        'room_bath' => $request->room_bath,
                        'room_media' => $request->room_media,
                    ]);*/

        $main_img = $request->file('main_img');
        $sml_img1 = $request->file('sml_img1');
        $sml_img2 = $request->file('sml_img2');
        $sml_img3 = $request->file('sml_img3');
        $sml_img4 = $request->file('sml_img4');
        $sml_img5 = $request->file('sml_img5');
        $sml_img6 = $request->file('sml_img6');
        $sml_img7 = $request->file('sml_img7');

        if($main_img != null) 
        {
            $main = $request->file('main_img')->getClientOriginalName();
            $request->file('main_img')->move(public_path().'/images',$main);
            $id->main_img='/images/'.$main;
        
        } else {
            $id->main_img=$id->main_img;
        }

        if($sml_img1 != null)
        {
            $sml1 = $request->file('sml_img1')->getClientOriginalName();
            $request->file('sml_img1')->move(public_path().'/images',$sml1);
            $id->sml_img1='/images/'.$sml1;

        } else {
            $id->sml_img1=$id->sml_img1;
        }

        if($sml_img2 != null)
        {
            $sml2 = $request->file('sml_img2')->getClientOriginalName();
            $request->file('sml_img2')->move(public_path().'/images',$sml2);
            $id->sml_img2='/images/'.$sml2;

        } else {
            $id->sml_img2=$id->sml_img2;
        }

        if($sml_img3 != null)
        {
            $sml3 = $request->file('sml_img3')->getClientOriginalName();
            $request->file('sml_img3')->move(public_path().'/images',$sml3);
            $id->sml_img3='/images/'.$sml3;

        } else {
            $id->sml_img3=$id->sml_img3;
        }

        if($sml_img4 != null)
        {
            $sml4 = $request->file('sml_img4')->getClientOriginalName();
            $request->file('sml_img4')->move(public_path().'/images',$sml4);
            $id->sml_img4='/images/'.$sml4;

        } else {
            $id->sml_img4=$id->sml_img4;
        }

        if($sml_img5 != null)
        {
            $sml5 = $request->file('sml_img5')->getClientOriginalName();
            $request->file('sml_img5')->move(public_path().'/images',$sml5);
            $id->sml_img5='/images/'.$sml5;

        } else {
            $id->sml_img5=$id->sml_img5;
        }

        if($sml_img6 != null)
        {
            $sml6 = $request->file('sml_img6')->getClientOriginalName();
            $request->file('sml_img6')->move(public_path().'/images',$sml6);
            $id->sml_img6='/images/'.$sml6;

        } else {
            $id->sml_img6=$id->sml_img6;
        }

        if($sml_img7 != null)
        {
            $sml7 = $request->file('sml_img7')->getClientOriginalName();
            $request->file('sml_img7')->move(public_path().'/images',$sml7);
            $id->sml_img7='/images/'.$sml7;

        } else {
            $id->sml_img7=$id->sml_img7;
        }

                        $id->room_name = $request->room_name;
                        $id->room_bed = $request->room_bed;
                        $id->room_bath = $request->room_bath;
                        $id->room_media = $request->room_media;
                        $id->room_price = $request->room_price;

                        $id->save();

                       // return view('fff', ['main'=>$sml1]);
        return redirect()->action('ConsoleController@index')->with('updatedRoom', 'Данные комнаты '.$id->id.' были обновлены');

       
    }

     public function storeContact(Request $request) {
            $contactInfo = new ContactPage;
            $contactInfo->hotel_name = $request->hotel_name;
            $contactInfo->street = $request->street;
            $contactInfo->city = $request->city;
            $contactInfo->post_index = $request->post_index;
            $contactInfo->phone = $request->phone;
            $contactInfo->fax = $request->fax;
            $contactInfo->email = $request->email;
            $contactInfo->map = $request->map;
            $contactInfo->save();
            return redirect()->action('ConsoleController@index')->with('message2', 'Контактная информация '.' has been added with id='.$contactInfo->id);

    }

    public function updateContact(Request $request, ContactPage $id) {
            $id->hotel_name = $request->hotel_name;
            $id->street = $request->street;
            $id->city = $request->city;
            $id->post_index = $request->post_index;
            $id->phone = $request->phone;
            $id->fax = $request->fax;
            $id->email = $request->email;
            $id->map = $request->map;
            $id->save();
            return redirect()->action('ConsoleController@index')->with('updContact', 'Контактная информация '.' была обновлена id='.$id->id);
    }

    public function aboutCreate(Request $request) {
        $about = new About;

        $main_img = $request->file('main_img');
        $sml_img1 = $request->file('sml_img1');
        $sml_img2 = $request->file('sml_img2');
        $sml_img3 = $request->file('sml_img3');

        if($main_img != null && $sml_img1 != null && $sml_img2 != null && $sml_img3 != null) 
        {
            $main = $request->file('main_img')->getClientOriginalName();
            $sml1 = $request->file('sml_img1')->getClientOriginalName();
            $sml2 = $request->file('sml_img2')->getClientOriginalName();
            $sml3 = $request->file('sml_img3')->getClientOriginalName();

            $request->file('main_img')->move(public_path().'/images/about',$main);
            $request->file('sml_img1')->move(public_path().'/images/about',$sml1);
            $request->file('sml_img2')->move(public_path().'/images/about',$sml2);
            $request->file('sml_img3')->move(public_path().'/images/about',$sml3);
           
            $about->main_img='/images/about'.$main;
            $about->sml_img1='/images/about'.$sml1;
            $about->sml_img2='/images/about'.$sml2;
            $about->sml_img3='/images/about'.$sml3;
            
        } else {
            
            $about->main_img='';
            $about->sml_img1='';
            $about->sml_img2='';
            $about->sml_img3='';

        }

        $about->big_name=$request->big_name;
        $about->type_name=$request->type_name;
        $about->short_text=$request->short_text;
        $about->description_one=$request->description_one;
        $about->description_two=$request->description_two;
        $about->description_three=$request->description_three;

        $about->save();

        return redirect()->action('ConsoleController@index')->with('about', 'Информация для страницы об отеле '.' была добавлена с id= '.$about->id);
    }

    public function aboutUpdate(Request $request, About $id) {
        $main_img = $request->file('main_img');
        $sml_img1 = $request->file('sml_img1');
        $sml_img2 = $request->file('sml_img2');
        $sml_img3 = $request->file('sml_img3');

        if($main_img != null) 
        {
            $updMain = $request->file('main_img')->getClientOriginalName();
            $request->file('main_img')->move(public_path().'/images/about/',$updMain);
            $id->main_img='/images/about/'.$updMain;
        
        } else {
            $id->main_img=$id->main_img;
        }

        if($sml_img1 != null)
        {
            $sml1 = $request->file('sml_img1')->getClientOriginalName();
            $request->file('sml_img1')->move(public_path().'/images/about/',$sml1);
            $id->sml_img1='/images/about/'.$sml1;

        } else {
            $id->sml_img1=$id->sml_img1;
        }

        if($sml_img2 != null)
        {
            $sml2 = $request->file('sml_img2')->getClientOriginalName();
            $request->file('sml_img2')->move(public_path().'/images/about/',$sml2);
            $id->sml_img2='/images/about/'.$sml2;

        } else {
            $id->sml_img2=$id->sml_img2;
        }

        if($sml_img3 != null)
        {
            $sml3 = $request->file('sml_img3')->getClientOriginalName();
            $request->file('sml_img3')->move(public_path().'/images/about/',$sml3);
            $id->sml_img3='/images/about/'.$sml3;

        } else {
            $id->sml_img3=$id->sml_img3;
        }

        

                    $id->big_name = $request->big_name;
                    $id->type_name = $request->type_name;
                    $id->short_text = $request->short_text;
                    $id->description_one = $request->description_one;
                    $id->description_two = $request->description_two;
                    $id->description_three = $request->description_three;
                   

                    $id->save();

                       // return view('fff', ['main'=>$sml1]);
        return redirect()->action('ConsoleController@index')->with('updatedAbout', 'Данные страницы об отеле '.$id->id.' были обновлены');

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
    public function update(Request $request, $id)
    {
        //
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
