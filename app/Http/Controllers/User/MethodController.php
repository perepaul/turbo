<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Models\WithdrawalMethod;

class MethodController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $withdraw_methods = $user->methods()->orderBy('default', 'desc')->get();
        return view('user.withdrawal.methods.index', compact('withdraw_methods'));
    }

    public function select(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user_methods = $user->methods()->orderBy('default', 'asc')->get();
        $methods = Method::latest()->get();
        return view('user.withdrawal.methods.select', compact('methods', 'user_methods'));
    }

    public function create($id)
    {
        $method = Method::find($id);
        if (!$method) return back()->with('error', 'Please select a withdrawal method');
        return view('user.withdrawal.methods.create', compact('method'));
    }

    public function store(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'details' => 'required|json',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $valid['method_id'] = $id;

        if (!$user->methods->count()) $valid['default'] = 1;

        $user->methods()->create($valid);
        return response()->json(['success' => true]);
    }

    public function default($id)
    {
        $method = WithdrawalMethod::findOrFail($id)->load('user');
        $user = $method->user;
        $user->methods()->where('default', 1)->update(['default' => 0]);
        $method->default = 1;
        $method->save();
        session()->flash('success', "$method->name now marked as default");
        return back();
    }

    public function unlink($id)
    {
        $method = WithdrawalMethod::findOrFail($id)->load('user');
        $user = $method->user;
        if ($user->methods->count() < 2) {
            return back()->with('error', 'You have just one method, you need to add more to continue');
        }

        if ($method->default) {
            return back()->with('error', 'You cannot unlink the default withdrawal method, make another default first.');
        }
        $method->unlinked = 1;
        $method->save();
        session()->flash('success', "$method->name unlinked succesfully");
        return back();
    }
}
