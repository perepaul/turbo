<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class ActivationController extends Controller
{
    public function __construct()
    {
        // $user = User::find(auth()->user()->id);
        // if($user->statusIs('active')) return redirect()->route('user.index');
        // if($user->statusIs('rejected')) return redirect()->route('user.activation.rejected');
    }
    public function stepOne()
    {
        if (!is_null(auth('user')->user()->country)) return redirect()->route('user.activation.step.two');
        return view('user.activation.step1');
    }

    public function storeStepOne(Request $request)
    {
        $valid = $request->validate([
            'phone' => 'required|regex:/^[+][0-9]{9,14}/',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'zip_code' => 'required|string',
        ], [
            'phone.regex' => 'The phone number must be in international format'
        ]);
        $user = User::find(auth('user')->user()->id);
        $user->update($valid);
        return redirect()->route('user.activation.step.two');
    }

    public function stepTwo()
    {
        if (!is_null(auth('user')->user()->currency_id)) return redirect()->route('user.activation.complete');
        $currencies = Currency::all();
        return view('user.activation.step2', compact('currencies'));
    }

    public function storeStepTwo(Request $request)
    {
        $valid = $request->validate([
            'currency_id' => 'required|numeric',
            'id_back' => 'required|mimes:png,jpg,jpeg',
            'id_front' => 'required|mimes:png,jpg,jpeg',
            'profile' => 'nullable|mimes:png,jpg,jpeg',
        ], [
            'currency_id.required' => "Please select account currency",
            'currency_id.numeric' => "Only numbers are allowed",
            'id_front.required' => "Please upload the front of your ID card",
            'id_back.required' => "Please upload the back of your ID card",
            'id_back.mimes' => "Only png,jpg or jpeg file formats is allowed",
            'id_front.mimes' => "Only png,jpg or jpeg file formats is allowed",
            'profile.mimes' => "Only png,jpg or jpeg file formats is allowed",
        ]);
        $user = User::find(auth('user')->user()->id);
        $valid['id_back'] = $this->upload($valid['id_back'], config('dir.id'));
        $valid['id_front'] = $this->upload($valid['id_front'], config('dir.id'));
        $valid['profile'] = $this->upload($valid['profile'], config('dir.profile'));
        $user->update($valid);
        return redirect()->route('user.activation.complete');
    }

    private function upload($file, $dir)
    {
        $filename = str_replace(' ', '', rand() . now()->toDateString() . '.' . $file->extension());
        $file->move(public_path($dir), $filename);
        return $filename;
    }

    public function complete()
    {
        if (auth('user')->user()->status == 'active') {
            return redirect()->route('user.index');
        } elseif (auth('user')->user()->status == 'rejected') {
            return redirect()->route('user.activation.rejected');
        }
        return view('user.activation.complete');
    }
}
