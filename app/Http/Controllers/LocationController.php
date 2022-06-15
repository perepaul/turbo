<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CountryHelper;
use App\View\Components\States;
use Illuminate\Support\Facades\Blade;

class LocationController extends Controller
{
    public function getStates(Request $request)
    {
        return response()
            ->json([
                'states' => Blade::renderComponent(
                    new States(
                        $request->input('country')
                    )
                )
            ]);
    }
}
