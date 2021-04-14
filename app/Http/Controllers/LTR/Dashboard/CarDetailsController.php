<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarDetailsController extends Controller
{
    public function show(Request $request, $slug)
    {   
        $id = intval(explode('-', $slug)[1])/17;
        $car = Car::find($id);

        $context = [
            'car'=>$car,
        ];
        
        return view('LTR.dashboard.car_details', $context);
    }
}
