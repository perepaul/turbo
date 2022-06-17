<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RobotController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $robot = $user->robots()->latest()->first();
        return view('user.robot', compact('user', 'robot'));
    }

    public function link(Request $request)
    {
        $request->validate([
            'key' => ['required', 'string']
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $robot = Robot::where('key', $request->input('key'))->first();

        if (!$robot) {
            return response()->json([
                'errors' => [
                    'key' => 'Invalid robot key, please try again or contact support'
                ]
            ], 400);
        }

        $user->robots()->attach($robot->id);

        return response()->json([
            'message' => 'Robot linked successfully'
        ]);
    }

    public function upgrade(Request $request)
    {
        $request->validate([
            'key' => ['required', 'string']
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $robot = Robot::where('key', $request->input('key'))->first();

        if (!$robot) {
            return response()->json([
                'errors' => [
                    'key' => 'Invalid robot key, please try again or contact support'
                ]
            ], 400);
        }

        if ($user->robots()->where('robots.key', $request->input('key'))->exists()) {
            return response()->json([
                'errors' => [
                    'key' => 'You cannot upgrade to your current robot.'
                ]
            ], 400);
        }

        $user->robots()->detach();
        $user->robots()->attach($robot->id);

        return response()->json([
            'message' => 'Robot upgraded successfully'
        ]);
    }
}
