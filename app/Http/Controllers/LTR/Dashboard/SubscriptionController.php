<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function show(Request $request)
    {  
        $context = [
        ];

        return view('LTR.dashboard.manage_sub', $context);
    }
}
