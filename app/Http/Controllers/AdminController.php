<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    
    public function index() {

    	if (!Auth::check())
		{
		return redirect('main');
		}


		if (Auth::check()) 
		{
	       // The user is logged in...

	       $admin = Auth::user();
	       return view('admin', 'admin' => $admin);
        }
    }
}
