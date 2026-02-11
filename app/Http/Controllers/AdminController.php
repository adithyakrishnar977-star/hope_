<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
   public function index()
    {

        $allPatients = User::where('role', 'patient')->get();
        $allActiveTherapists = User::where('role', 'therapist')->where('active', true)->get();
        $allNonActiveTherapists = User::where('role', 'therapist')->where('active', false)->get();
        $upcomingSessions = DB::table('appointments as a')
            ->join('users as p', 'a.patient_id', '=', 'p.id')
            ->join('users as t', 'a.therapist_id', '=', 't.id')
            ->select(
                'a.*',                
                'p.name as patient_name',
                't.name as therapist_name',


            )
            ->where('p.role','patient')
            
            ->whereDate('a.app_date', '>=', now()->toDateString())
            ->get();   
        return view('admin.dashboard',compact('allNonActiveTherapists','allActiveTherapists','allPatients','upcomingSessions'));
    }

    public function therapistdelete(Request $request)
    {
        User::where('id', $request->therapistid)->where('role', 'therapist')->delete();

        return redirect()->back()->with('success', 'Therapist deleted successfully');
    }

    public function patientdelete(Request $request)
    {
        User::where('id', $request->patientid)->where('role', 'patient')->delete();

        return redirect()->back()->with('success', 'Therapist deleted successfully');
    }




     public function therapistapprove(Request $request, User $user)
    {
      $therapistid= $request->therapistid;
      $appstatus=$request->appstatus;

      // Validate input
        $request->validate([
            'therapistid' => 'required|exists:users,id',
            'appstatus' => 'required|integer',
        ]);

        // Fetch the appointment
        $User = User::find($request->input('therapistid'));

        if (!$User) {
            return redirect()->back()->with('error', 'Therapist not found.');
        }

        // Update the record
        $User->active = $request->input('appstatus');
        $User->save();

        return redirect()->back()->with('success', 'Therapist updated successfully!');

    }
    
}
