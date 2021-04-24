<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Validator, Auth;

class CarDetailsController extends Controller
{
    public function show(Request $request, $slug='c-17')
    {   
        $id = intval(explode('-', $slug)[1])/17;
        $car = Car::find($id);
        $car_options = [
            "Dvd/cd/mp3",
            "Alarme",
            "Aide parking",
            "Abs",

            "Carnet d'entretien",
            "Anti patinage",
            "Capot électrique",
            "Rétroviseur extérieur électrique",

            "Toit ouvrant",
            "Siège chauffant",
            "Siège sport",
            "Volant réglable",

            "Volant sport",
            "Détecteur de pluie",
            "Direction assistée",
            "Ordinateur de bord",

            "Régulateur de vitesse",
            "Affichage tête haute",
            "Frein de parking automatique",
            "Système d'identification du conducteur",

            "Jantes aluminium",
            "Airbags",
            "Climatisation auto",
            "Système de navigation / GPS",

            "Vitres électriques",
            "Programme de stabilité électronique",
            "Projecteurs xénons",
            "Toit ouvrant panoramique",

            "Intérieur cuir",
            "Siège électrique",
            "Vitres surteintées",
            "Anti démarrage",

            "Contrôle de pression des pneus",
            "Climatisation multizone",
            "Keyless go",
            "Radio commande au volant",

            "Anti brouillard",
            "Suspension sport",
            "Non-fumeur",
        ];
        $context = [
            'car'=>$car,
            'car_options'=>$car_options,
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
            if (Auth::user()->canAddCar()) {
                $car->available = 1;
                $car->visible = 1;
            } else {
                return response()->json(['limit'=> 'Vous ne pouvez pas mettre plus de '.Auth::user()->pack->nombre_de_voitures.' voitures en vente.']);
            }
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
