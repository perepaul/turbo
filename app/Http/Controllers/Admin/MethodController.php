<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Method::paginate();
        return view('admin.method.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'status' => 'required|in:active,inactive'
        ]);
        if ($request->hasFile('image')) {
            $valid['image'] = uploadFile($request->file('image'), public_path(config('dir.methods')));
        }
        Method::create($valid);
        session()->flash('success', 'Created payment method successfully');
        return redirect()->route('admin.settings.methods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        $method->status = $method->status == 'active' ? 'inactive' : 'active';
        $method->save();
        session()->flash('success', 'Payment method updated');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        return view('admin.method.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        $valid = $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('image')) {
            $dir = public_path(config('dir.methods'));
            $valid['image'] = uploadFile($request->file('image'), $dir);
            if (file_exists($file = $dir . $method->image)) unlink($dir);
        }
        $method->update($valid);
        session()->flash('success', 'updated payment method successfully');
        return redirect()->route('admin.settings.methods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        is_file(public_path(config('dir.methods') . $method->image)) ? unlink(public_path(config('dir.methods') . $method->image)) : null;
        $method->delete();
        session()->flash('success', 'deleted payment method successfully');
        return redirect()->route('admin.settings.methods.index');
    }
}
