<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
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

            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users'
            ]);

            dd($request->all());
        }

        if ($request->has('garage_edit_form')) {

            $this->validate($request, [
                'nom_garage' => 'required|email',
                'adresse' => 'required',
                'fixe' => 'required',
                'fax' => 'required',
                'code_postal' => 'required'
            ]);

            dd($request->all());

        }

        if ($request->has('password_edit_form')) {

            $this->validate($request, [
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

            dd($request->all());

        }
        

        return view('LTR.dashboard.profile');
    }
}