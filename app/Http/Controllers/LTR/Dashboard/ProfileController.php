<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Auth, Validator;
use App\Rules\isValidPassword;

class ProfileController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {  
        $context = [
        ];

        return view('LTR.dashboard.profile', $context);
    }

    

    public function store(Request $request)
    {  
        $user = Auth::user();

        // profile form
        if ($request->exists('profile_edit_form')) {
            
            // validation rules
            $validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user)
                ],
                'phone' => [
                    'required',
                    Rule::unique('users')->ignore($user)
                ],
            ]);

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json($validator->messages());
            }

            // if validated
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();
            return response()->json(['success'=> 'Les informations ont été mises à jour avec succès']);
        }

        // password form
        if ($request->exists('password_edit_form')) {
            
            // validation rules
            $validator = Validator::make($request->all(), [
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('The old password you have entered is incorrect.');
                        }
                    }
                ],
                'new_password' => [
                    'required',
                    new isValidPassword(),
                    'different:old_password',
                    'confirmed',
                ],
                'new_password_confirmation' => 'required'
            ]);

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json($validator->messages());
            }

            // if validated
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['success'=> 'Mot de passe met à jour avec succès.']);

        }

        // garage_form
        if ($request->exists('garage_edit_form')) {

            // validation rules
            $validator = Validator::make($request->all(), [
                'nom_garage' => 'required',
                'adresse' => 'required',
                'fixe' => 'required',
                'fax' => 'required',
                'code_postal' => 'required'
            ]);

            // check if the validation fails
            if ($validator->fails()) {
                return response()->json($validator->messages());
            }

            // if validated
            $user->nom_garage = $request->nom_garage;
            $user->adresse = $request->adresse;
            $user->fixe = $request->fixe;
            $user->fax = $request->fax;
            $user->code_postal = $request->code_postal;
            $user->save();
            return response()->json(['success'=> 'Les informations ont été mises à jour avec succès']);

        }

    }
}