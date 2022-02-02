<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\ContactForm;
use App\ContactPage;

class ContactController extends Controller
{
    //
    public function index() {

        $content = ContactPage::find(1);
    	return view('contact', ['info'=>$content]);
    }

    public function store(Request $request) {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'string',
            'email' => 'required|email',
            'text' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }

        $contactForm = new ContactForm;
        $contactForm->name = $request->name;
        $contactForm->phone = $request->phone;
        $contactForm->email = $request->email;
        $contactForm->text = $request->message;
        $contactForm->save();

        return redirect()->action('ContactController@index')->with('message','Ваше сообщение '.$contactForm->name.' has been added with id='.$contactForm->id);
    }

}
