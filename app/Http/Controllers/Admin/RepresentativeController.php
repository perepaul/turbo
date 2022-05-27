<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Representative\Approved;
use App\Mail\Representative\Rejected;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RepresentativeController extends Controller
{
    public function index(Request $request)
    {
        $query = Representative::query();
        if ($request->filled('filter')) {
            $filter = $request->input('filter');
            $query->where('status', $filter);
        }
        return view('admin.rep', ['reps' => $query->paginate()]);
    }

    public function approve($id)
    {
        $rep = Representative::findOrFail($id);
        $rep->status = 'accepted';
        $rep->save();
        Mail::to($rep->user)->send(new Approved());
        return back();
    }

    public function reject($id)
    {
        $rep = Representative::findOrFail($id);
        $rep->delete();
        Mail::to($rep->user)->send(new Rejected());
        return back();
    }

    public function view($id)
    {
    }
}
