<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Representative\Pending;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    public function referrals()
    {
        $user = User::find(auth()->user()->id)->load('referrals');
        $referrals = $user->referrals()->paginate();
        return view('user.referrals', compact('user', 'referrals'));
    }

    public function representative()
    {
        $user = User::find(auth()->user()->id);
        $rep = $user->representatives()->first();
        return view('user.regional-rep', compact('user', 'rep'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'state' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'question_one' => 'required|in:yes,no',
            'question_two' => 'required|in:yes,no',
            'question_three' => 'required',
            'passport' => 'required|image',
            'id_card' => 'required|image',
        ]);
        $valid['passport'] = $this->uploadFile($request->file('passport'));
        $valid['id_card'] = $this->uploadFile($request->file('id_card'));
        $user = User::find(auth()->user()->id);
        $user->representatives()->create($valid);
        Mail::to($user)->send(new Pending());
        session()->flash('success', 'Application submitted, awaiting review');
        return back();
    }

    private function uploadFile($file)
    {
        $filename = Str::random(5) . rand() . Str::random(5) . '.' . $file->extension();
        $file->move(public_path(config('dir.passport')), $filename);
        return $filename;
    }
}
