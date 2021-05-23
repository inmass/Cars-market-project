<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;
use App\Rules\IsValidPassword;

class AddGarageController extends Controller
{
    public function show(Request $request)
    {
        $context = [
            
        ];
        return view('LTR.dashboard.add_garage', $context);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', Rule::unique('users')],
            'password' => [
                'required',
                new isValidPassword(),
                'different:old_password',
                'confirmed',
            ],
            'password_confirmation' => 'required',
            'phone' => ['required', Rule::unique('users')],
            'nom_garage' => 'required',
            'logo_garage' => 'required',
            'fixe' => 'required',
            'fax' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'rc' => 'required',
            'if' => 'required',
            'ice' => 'required',
            'pack_id' => 'required',
            'pack_end_date' => 'required'
        ]);  
        
        // check if the validation fails
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }   

        $garage = new User;
        $garage->nom = $request->nom;;
        $garage->prenom = $request->prenom;
        $garage->email = $request->email;
        $garage->password = Hash::make($request->password);
        $garage->phone = $request->phone;
        $garage->nom_garage = $request->nom_garage;
        // logo saving
        $imageName = time().$request->file('logo_garage')->getClientOriginalName();  
        $request->file('logo_garage')->move(public_path('images/uploads'), $imageName);
        $garage->logo_garage = $imageName;
        // logo saving
        $garage->fixe = $request->fixe;
        $garage->fax = $request->fax;
        $garage->ville = $request->ville;
        $garage->adresse = $request->adresse;
        $garage->code_postal = $request->code_postal;
        $garage->rc = $request->rc;
        $garage->if = $request->if;
        $garage->ice = $request->ice;
        $garage->pack_id = $request->pack_id;
        $garage->pack_end_date = $request->pack_end_date;
        $garage->save();


        return response()->json(['success'=> 'Garage ajoutée avec succés.']);
    }
}
