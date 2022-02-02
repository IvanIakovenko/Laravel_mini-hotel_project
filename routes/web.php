<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('main');
});*/

Route::get('/log2', function () {
    return view('login2');
});

Route::get('/reg2', function () {
    return view('register2');
});



/*Route::get('/rooms', function () {
    return view('rooms');
});*/

Route::get('/login', function () {
    return view('login2');
}); // стандартный Ларавеловский view login, мой login2

Route::get('register', function () {
    return view('register2');
});

Route::post('/lk', 'BookingController@show'); // переход в ЛК с Rooms
Route::post('/ask', 'LkPageController@bookingFromLk');
Route::get('/lk', 'LkPageController@index'); // для перехода в lk с меню 
Route::post('/addBook', 'BookingController@book');
Route::post('/check', 'MainPageController@checkRooms');

/*AJAX*/
Route::get('/ajax', 'AjaxController@index');



/*Route::get('/login', 'LoginController@showLoginForm' {
    return view('login2');
});*/

/*Route::get('/adpart', function () {
    return view('admin');
});*/
Route::get('/contact', 'ContactController@index');
Route::post('/send', 'ContactController@store');

Route::get('/rooms', 'RoomsController@index');

Route::post('/addRoom', 'ConsoleController@store'); // Добавление комнат
Route::post('/ask/room', 'ConsoleController@getRoomForUpdate'); //выбераем комнату для обновления
Route::post('/update/room/{id}', 'ConsoleController@updateRooms'); // обновляем комнату
Route::post('/addContact', 'ConsoleController@storeContact');
Route::post('/updContact/{id}', 'ConsoleController@updateContact');

Route::post('/addShedule', 'ConsoleController@create'); //создаём расписание в таблице shedule
Route::post('/addShedule2', 'ConsoleController@create2'); //тест
Route::post('/addCarousel', 'ConsoleController@createCarousel');
Route::post('/updCarousel/{id}', 'ConsoleController@updateCarousel'); // Обновляем фото карусели

Route::get('/about', 'AboutPageController@index');
Route::post('/addAbout', 'ConsoleController@aboutCreate');
Route::post('/updAbout/{id}', 'ConsoleController@aboutUpdate');


Route::get('/adpart', 'ConsoleController@index');

Route::get('/main', 'MainPageController@index');
Route::get('/', 'MainPageController@index');

Route::get('/reception', 'ReceptionController@index');
Route::post('/reception', 'ReceptionController@booking');
Route::post('/booked', 'ReceptionController@book');
Route::post('/search', 'ReceptionController@search');
Route::post('/updBooking/{id}', 'ReceptionController@update');
Route::delete('/cancelBooking/{id}', 'ReceptionController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index');

