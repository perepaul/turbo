<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\WithdrawalMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalAcceptedMailable;
use App\Mail\WithdrawalDeclinedMailable;
use App\Models\Method;
use Illuminate\Support\Carbon;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['pending', 'approved', 'declined'])) $status = 'approved';
        // dd(Withdrawal::where('status','pending')->get());
        $q = Withdrawal::query()->where('status', $status);
        $withdrawals = $q->latest()->paginate();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();
        // $withdrawal->user()->update(['balance' => $withdrawal->user->balance - $withdrawal->amount]);
        Mail::to($withdrawal->user)->send(new WithdrawalAcceptedMailable($withdrawal));
        session()->flash('success', 'Withdrawal accepted');
        return back();
    }

    public function decline($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'declined';
        $withdrawal->save();
        $withdrawal->user()->update(['balance' => $withdrawal->user->balance + $withdrawal->amount]);
        Mail::to($withdrawal->user)->send(new WithdrawalDeclinedMailable($withdrawal));
        session()->flash('success', 'Withdrawal accepted');
        return back();
    }

    public function methods()
    {
        $methods = WithdrawalMethod::withoutGlobalScopes()->with('user', 'method')->paginate();
        return view('admin.withdrawals.methods', compact('methods'));
    }

    public function view($id)
    {
        $method = WithdrawalMethod::withoutGlobalScopes()->findOrFail($id)->load('method', 'user');
        $html = view('admin.withdrawals.modal-content', compact('method'))->render();
        return response()->json(['html' => $html]);
    }

    public function changeDate(Request $request, $id)
    {
        if (!$request->filled('created_at')) {
            session()->flash('error', 'Please fill the date field with a valid date');
            return back();
        }

        $created_at = Carbon::createFromTimeString($request->input('created_at'));
        $method = WithdrawalMethod::findOrFail($id);
        // dd($method);
        $method->update(['created_at' => $created_at]);
        session()->flash('success', 'Date changed successfully');
        return back();
    }

    public function link($id)
    {
        $method = WithdrawalMethod::withoutGlobalScopes()->findOrFail($id)->load('method', 'user');
        $method->unlinked = 0;
        $method->save();
        return back()->withSuccess('Withdrawal method linked successfully');
    }

    public function unlink($id)
    {
        $method = WithdrawalMethod::withoutGlobalScopes()->findOrFail($id)->load('method', 'user');
        $method->unlinked = 1;
        $method->save();
        return back()->withSuccess('Withdrawal method unlinked successfully');
    }
}
