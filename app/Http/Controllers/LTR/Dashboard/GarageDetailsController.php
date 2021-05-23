<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class GarageDetailsController extends Controller
{
    public function show(Request $request, $slug=null)
    {
        if ($slug==null) {
            return redirect()->route('garages_list');
        }
        if (User::find($slug)) {
            $garage = User::find($slug);
    
    
            $context = [
                'garage' => $garage,
            ];
    
            return view('LTR.dashboard.garage_details', $context);
        } else {
            return redirect()->route('garages_list');
        }
    }

    public function store(Request $request, $slug)
    {   
        $garage = User::find($slug);

        // validation rules
        $validator = Validator::make($request->all(), [
            'nom_garage' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'fixe' => 'required',
            'fax' => 'required',
            'code_postal' => 'required'
        ]);

        // check if the validation fails
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        // if validated
        $garage->nom_garage = $request->nom_garage;
        $garage->adresse = $request->adresse;
        $garage->phone = $request->phone;
        $garage->fixe = $request->fixe;
        $garage->fax = $request->fax;
        $garage->code_postal = $request->code_postal;
        $garage->save();
        return response()->json(['success'=> 'Les informations ont été mises à jour avec succès']);     
    }
}
