<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{

    public function index()
    {
        $methods = Method::paginate();
        return view('admin.method.index', compact('methods'));
    }


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
            'is_bank' => 'required|in:1,0',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'qrcode_image' => 'nullable|required_if:is_bank,0|mimes:jpg,jpeg,png',
            'status' => 'required|in:active,inactive',
        ]);
        if ($request->hasFile('image')) {
            $valid['image'] = uploadFile($request->file('image'), public_path(config('dir.methods')));
        }

        if ($request->hasFile('qrcode_image')) {
            $valid['qrcode_image'] = uploadFile($request->file('qrcode_image'), public_path(config('dir.methods')));
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
            'qrcode_image' => 'nullable|required_if:is_bank,0|mimes:png,jpg,jpeg',
            'status' => 'required|in:active,inactive',
            'is_bank' => 'required|in:1,0',
        ]);

        if ($request->hasFile('image')) {
            $dir = public_path(config('dir.methods'));
            $valid['image'] = uploadFile($request->file('image'), $dir);
            if (is_file($file = $dir . $method->image) && file_exists($file)) {
                unlink($file);
            }
        }

        if ($request->hasFile('qrcode_image')) {
            $dir = public_path(config('dir.methods'));
            $valid['qrcode_image'] = uploadFile($request->file('qrcode_image'), $dir);
            if (is_file($file = $dir . $method->qrcode_image) && file_exists($file)) {
                unlink($file);
            }
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
