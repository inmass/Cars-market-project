<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Auth;

class DashBoardController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {   

        $total_cars = Car::where('user_id' ,'=', Auth::user()->id)->get();
        $available_cars = Car::where('available' ,'=', 1)->where('visible', '=', 1)->where('user_id' ,'=', Auth::user()->id)->get();
        $paused_cars = Car::where('available' ,'=', 1)->where('visible', '=', 0)->where('user_id' ,'=', Auth::user()->id)->get();
        $sold_cars = Car::where('available' ,'=', 0)->where('user_id' ,'=', Auth::user()->id)->get();
        $particular_cars = Car::where('particular_id' ,'!=', NULL)->get();

        $context = [
            'total_cars'=> $total_cars,
            'available_cars' => $available_cars,
            'paused_cars' => $paused_cars,
            'sold_cars' => $sold_cars,
            'particular_cars' => $particular_cars,
        ];

        return view('LTR.dashboard.dashboard', $context);
    }
}
