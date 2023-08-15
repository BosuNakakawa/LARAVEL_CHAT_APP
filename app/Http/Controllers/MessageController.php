<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $message = $request->message;

        $model = new Message();
        $model->user_id = $user_id;
        $model->message = $message;
        $model->save();

        return response()->json([
            'message' => $message
        ]);
    }

    public function fetch(Request $request)
    {
        $model = Message::all();

        $message = $model->where('user_id', $request->user_id);

        return response()->json([
            'message' => $message
        ]);
    }
}
