<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddCarController extends Controller
{
    public function show(Request $request)
    {        
        return view('LTR.dashboard.add_car');
    }

    public function store(Request $request)
    {        
        dd($request->all());
    }
    // $marque = str_replace('_', ' ', $request->marque);
}
