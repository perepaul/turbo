<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        $contact = Contact::find(1);
        return view('front.contact',compact('contact'));
    }

    public function sendContact(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        if($request->has('validity') && !is_null($request->validity)  || !empty($request->validity)){
            return;
        }

        Mail::to($valid['email'])->send(new SendContactMail($valid));
        session()->flash('message','Email Sent Successfully');
        return redirect()->back();
    }

    public function faq()
    {
        return view('front.faq');
    }
}
