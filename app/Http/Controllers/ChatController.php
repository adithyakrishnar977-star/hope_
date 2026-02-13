<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
   public function index($therapist, $patient)
    {
         $role = auth()->user()->role;
        if($role=='therapist'){
            $chatUser = User::findOrFail($patient);

        }elseif($role=='patient'){
            $chatUser = User::findOrFail($therapist);
        }
        return view('chat.chat', compact('therapist', 'patient', 'chatUser'));
    }

    // Fetch messages (AJAX)
    public function fetchMessages($therapist, $patient)
    {
       
        
        // $messages = Chat::where('therapist_id', $therapist)
        //                 ->where('patient_id', $patient)
        //                 ->orderBy('created_at', 'asc')
        //                 ->get();

        $messages = DB::table('chats as c')
            ->join('users as p', 'c.patient_id', '=', 'p.id')
            ->join('users as t', 'c.therapist_id', '=', 't.id')
            ->select(
                'c.*',                
                'p.name as patient_name',
                't.name as therapist_name',
            )
           ->where('patient_id', $patient)
           ->where('therapist_id', $therapist)            
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
