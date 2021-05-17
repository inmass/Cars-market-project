<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class ParticularCarsController extends Controller
{
    public function show(Request $request)
    {   

        $total_cars = Car::where('particular_id' ,'!=', NULL)->get();

        $context = [
            'total_cars'=> $total_cars->SortByDesc('created_at'),
        ];

        return view('LTR.dashboard.particularcars', $context);
    }
    public function admin_show(Request $request)
    {   
        $admin = true;

        $total_cars = Car::where('particular_id' ,'!=', NULL)->get();

        $context = [
            'total_cars'=> $total_cars->SortByDesc('created_at'),
            'admin' => $admin
        ];

        return view('LTR.dashboard.particularcars', $context);
    }
}
