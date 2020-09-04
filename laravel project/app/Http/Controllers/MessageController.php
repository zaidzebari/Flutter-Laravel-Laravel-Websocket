<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function recieve(Request $request) {
        event(new NewMessage($request->message));
        return response()->json($request);
    }
}
