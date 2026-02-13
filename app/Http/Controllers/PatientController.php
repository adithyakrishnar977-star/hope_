<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointments;

class PatientController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
         //$activeTherapists = User::where('role', 'therapist')->where('active', true)->get();
         $activeTherapists = DB::table('users as t')
            
            ->select(
                
                't.*'
            )
            ->where('t.role', 'therapist')
            ->where('t.active', true)
            ->distinct()
            ->get();
            

         $upcomingSessions = DB::table('appointments as a')
            ->join('users as p', 'a.patient_id', '=', 'p.id')
            ->join('users as t', 'a.therapist_id', '=', 't.id')
            ->select(
                'a.*',                
                't.name as therapist_name',

            )
            ->where('t.role','therapist')
            ->where('t.active',true)
            ->where('p.id', $userId)
            ->whereDate('a.app_date', '>=', now()->toDateString())
            ->where('a.status',1)
            ->get();   

            $consultationHistory = DB::table('appointments as a')
            ->join('users as p', 'a.patient_id', '=', 'p.id')
            ->join('users as t', 'a.therapist_id', '=', 't.id')
            ->select(
                'a.*',                
                't.name as therapist_name',

            )
            ->where('t.role','therapist')
            ->where('t.active',true)
            ->whereDate('a.app_date', '<=', now()->toDateString())
            ->where('p.id', $userId)
            ->where(function($query) {
        $query->where('a.status', '!=', 0)
              ->orWhereNull('a.status');
    })
            ->get();   
        //echo '<pre>';print_r($activeTherapists);
        return view('patient.dashboard',compact('activeTherapists','upcomingSessions','consultationHistory'));
    }

    public function book($id)
    {
         $userId = Auth::id();
        $currentTherapists = User::where('role', 'therapist')->where('active', true)->where('id', $id)->get();
        $allAppointments = Appointments::where('therapist_id', $id)->where('patient_id', $userId)->orderBy('created_at', 'desc')->get();
        $latestAppointments = Appointments::where('therapist_id', $id)->where('patient_id', $userId)->orderBy('created_at', 'desc')->first();
        //echo '<pre>';print_r($latestAppointments);exit;
        $latestAppointmentscount = $latestAppointments ? 1 : 0;
        return view('patient.book',compact('currentTherapists','id','allAppointments', 'userId', 'latestAppointments', 'latestAppointmentscount'));
    }
    
}


