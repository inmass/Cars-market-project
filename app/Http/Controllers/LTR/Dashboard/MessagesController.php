<?php

namespace App\Http\Controllers\LTR\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function show(Request $request)
    {  
        $context = [
        ];

        return view('LTR.dashboard.messages', $context);
    }
    public function show_single(Request $request, $id)
    {  
        $message = Message::find($id);
        if (!$message->seen) {
            $message->seen = 1;
            $message->save();
        }
        return response()->json($message);
    }
}
