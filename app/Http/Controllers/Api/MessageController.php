<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'message' => 'required|string',
            'user_id' => 'required',
        ]);
        $message = new Message();
        $message->fill($data);
        $message->save();
        return response()->json($message);
    }
}
