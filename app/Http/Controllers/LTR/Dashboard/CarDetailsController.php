<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Validator;

class CarDetailsController extends Controller
{
    public function show(Request $request, $slug='c-17')
    {   
        $id = intval(explode('-', $slug)[1])/17;
        $car = Car::find($id);

        $context = [
            'car'=>$car,
        ];

        if ($request->ajax()) {
            return response()->json($car);
        }
        
        return view('LTR.dashboard.car_details', $context);
    }

    public function store(Request $request, $id=1)
    {   
        $car = Car::find($id);

        // validation rules
        $validator = Validator::make($request->all(), [
            'statut' => 'required',
            'prix' => 'required',
        ]);

        // check if the validation fails
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        // if validated
        if ($request->statut == 'en_vente') {
            $car->available = 1;
            $car->visible = 1;
        }
        if ($request->statut == 'en_pause') {
            $car->available = 1;
            $car->visible = 0;
        }
        if ($request->statut == 'vendue') {
            $car->available = 0;
            $car->visible = 0;
        }
        $car->prix = $request->prix;
        $car->save();

        return response()->json(['success'=> 'Les informations ont été mises à jour avec succès.']);
    }
}
