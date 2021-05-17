<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class GaragesController extends Controller
{
    public function show(Request $request)
    {  
        $garages = User::where('super_user', '=', 0)->get();

        $context = [
            'garages' => $garages,
        ];

        return view('LTR.dashboard.garages', $context);
    }
}
