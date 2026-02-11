<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
   public function index($therapist, $patient)
    {
        return view('chat.chat', compact('therapist', 'patient'));
    }

    // Fetch messages (AJAX)
    public function fetchMessages($therapist, $patient)
    {
        
        $messages = Chat::where('therapist_id', $therapist)
                        ->where('patient_id', $patient)
                        ->orderBy('created_at', 'asc')
                        ->get();

                        

        return response()->json($messages);
    }

    // Send message (AJAX)
    public function sendMessage(Request $request)
    {
        $userId = Auth::id();
        $request->validate([
            'therapist_id' => 'required',
            'patient_id' => 'required',
            'chat_content' => 'required'
        ]);

        $message = Chat::create([
            'therapist_id' => $request->therapist_id,
            'patient_id' => $request->patient_id,
            'chat_content' => $request->chat_content,
            'created_by'=> $userId,
        ]);

        return response()->json(['success' => true, 'message' => $message]);
    }
}
