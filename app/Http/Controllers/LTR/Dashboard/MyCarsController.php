<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Auth;

class MyCarsController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {   

        $total_cars = Car::where('user_id' ,'=', Auth::user()->id)->get();

        $context = [
            'total_cars'=> $total_cars,
        ];

        return view('LTR.dashboard.mycars', $context);
    }
}
