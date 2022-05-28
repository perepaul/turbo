<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\SendContactMail;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);
        $posts = Post::latest()->take(6)->get();
        // dd($contact);
        return view('front.index', compact('contact', 'posts'));
    }

    public function referral($referral_code)
    {
        $user = User::where('referral_code', $referral_code)->where('status', 'active')->first();
        session()->put('user', $user);
        return redirect()->route('register');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        $contact = Contact::find(1);
        return view('front.contact', compact('contact'));
    }

    public function sendContact(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        return response()->json();

        if ($request->has('validity') && !is_null($request->validity)  || !empty($request->validity)) {
            return;
        }
        $settings = Contact::find(1);
        if ($settings) {
            Mail::to($settings->support_email)->send(new SendContactMail($valid));
        }
        session()->flash('message', 'Email Sent Successfully');
        return redirect()->back();
    }

    public function faq()
    {
        return view('front.faq');
    }
}
