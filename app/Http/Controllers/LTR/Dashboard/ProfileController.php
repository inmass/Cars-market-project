<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        if ($request->has('profile_edit_form')) {
            
            error_log('this is profile_edit');
            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users'
            ]);

            if ($validator->fails()) {
                // return redirect()->route('profile')
                //             ->withErrors($validator)
                //             ->withInput();
                return response()->json($validator->messages());
            }

            dd($request->all());
        }

        if ($request->has('password_edit_form')) {
            
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

            if ($validator->fails()) {
                return redirect()->route('profile')
                            ->withErrors($validator)
                            ->withInput();
            }

            dd($request->all());

        }

        if ($request->has('garage_edit_form')) {

            $validator = Validator::make($request->all(), [
                'nom_garage' => 'required|email',
                'adresse' => 'required',
                'fixe' => 'required',
                'fax' => 'required',
                'code_postal' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('profile')
                            ->withErrors($validator)
                            ->withInput();
            }

            dd($request->all());

        }
        

    }
}