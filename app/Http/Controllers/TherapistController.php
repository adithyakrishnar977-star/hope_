<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TherapistController extends Controller
{
    public function index()
    {
       $userId = Auth::id();
        $activeRequests = DB::table('appointments as a')
            ->join('users as p', 'a.patient_id', '=', 'p.id')
            ->join('users as t', 'a.therapist_id', '=', 't.id')
            ->select(
                'a.*',
                'p.id as patient_id',
                'p.name as patient_name',
                'p.role as patient_role',
                'p.pfp as patient_pic',
                'p.location as patient_location',
                'p.email as patient_email',
                'p.phone as patient_phone',
                't.name as therapist_name',

            )
            ->where('t.id', $userId)
             ->where(function($query) {
        $query->where('a.status', '!=', 0)
              ->orWhereNull('a.status');
    })
            ->get();

             $upcomingSessions = DB::table('appointments as a')
            ->join('users as p', 'a.patient_id', '=', 'p.id')
            ->join('users as t', 'a.therapist_id', '=', 't.id')
            ->select(
                'a.*',                
                'p.name as patient_name',

            )
            ->where('p.role','patient')
            ->where('t.id', $userId)
            ->whereDate('a.app_date', '>=', now()->toDateString())
            ->where('a.status', 1)
            ->get();   
            // echo '<pre>';
            // print_r($activeRequests);
        return view('therapist.dashboard',compact('activeRequests','upcomingSessions', 'userId'));
    }
}
