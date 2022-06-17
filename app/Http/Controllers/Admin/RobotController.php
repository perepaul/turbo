<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Robot;
use Illuminate\Http\Request;

class RobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.robots.index', [
            'robots' => Robot::latest()->paginate(),
        ]);
    }

    public function create()
    {
        $html = view('admin.robots.fields', ['robot' => null])->render();
        return response()->json([
            'html' => $html
        ]);
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
            'key' => ['required', 'unique:robots'],
            'name' => ['required', 'string'],
            'type' => ['required', 'in:Automated Trading,Dual Trading,Manual Trading'],
        ]);

        $robot = new Robot;
        $robot->key = $valid['key'];
        $robot->name = $valid['name'];
        $robot->type = $valid['type'];
        $robot->save();

        return response()->json([
            'message' => 'Robot created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Robot  $robot
     * @return \Illuminate\Http\Response
     */
    public function show(Robot $robot)
    {
        $html = view('admin.robots.fields', ['robot' => $robot])->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function edit(Robot $robot)
    {
        return view('admin.robots.users', ['robot' => $robot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Robot  $robot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Robot $robot)
    {
        $valid = $request->validate([
            'key' => ['required', 'unique:robots,key,' . $robot->id],
            'name' => ['required', 'string'],
            'type' => ['required', 'in:Automated Trading,Dual Trading,Manual Trading'],
        ]);

        $robot->key = $valid['key'];
        $robot->name = $valid['name'];
        $robot->type = $valid['type'];
        $robot->save();

        return response()->json([
            'message' => 'Robot updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Robot  $robot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Robot $robot)
    {
        if ($robot->users()->count()) {
            return response()->json([
                'error' => 'Users are already using this robot'
            ], 400);
        }
        $robot->delete();
        return response()->json([
            'message' => 'Robot deleted successfully'
        ]);
    }
}
