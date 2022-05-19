<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    protected $rules = [
        'name' => ['required'],
        'amount' => ['required', 'numeric'],
        'bonus' => ['required', 'numeric'],
        // 'demo_balance' => ['required', 'numeric'],
        'features' => ['required'],
        'features.*' => ['required', 'string', 'min:3'],
        'referral_commission' => 'required|numeric',
        'trade_tenure' => 'required|numeric',
    ];
    protected $messages = [
        'features.*.required' => 'This feature is required',
        'features.*.string' => 'This feature must be a string',
        'features.*.min' => 'This feature must be at least 3 characters',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('created_at', 'desc')->get();
        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate($this->rules, $this->messages);
        DB::beginTransaction();
        try {
            Plan::create($valid);
            DB::commit();
            session()->flash('success', 'Plan created successfully');
            return redirect()->route('admin.plan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            session()->flash('error', "Failed to create Plan");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $valid = $request->validate($this->rules, $this->messages);
        DB::beginTransaction();
        try {
            $plan->update($valid);
            DB::commit();
            session()->flash('success', 'Plan updated successfully');
            return redirect()->route('admin.plan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            session()->flash('error', "Failed to create Plan");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        session()->flash('success', "Plan Deleted");
        return redirect()->back();
    }
}
