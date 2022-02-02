<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Config;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home'; ЭТО БЫЛО СТАНДАРТНОЕ
    //protected $redirectTo = '/main'; 

    //А ЭТО МОЁ
    /*protected function redirectTo()
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
           return redirect('/', ['admin' => $admin]);
           }
        }

    }*/

    protected function redirectTo()
    {
        $user = Auth::user()->name;
        $name = Config::get('constants.reception');

        switch ($user) {
            case 'Администратор':
                return '/reception';
                break;
            
            default:
                return '/main';
                break;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('login2');
    }
}
