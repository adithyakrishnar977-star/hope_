<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        
        'appdate' => 'required|date',
        'fromtime' => 'required',
        'totime' => 'required',
    ]);

    Appointments::create([
        'patient_id' => $request->patient_id,
        'therapist_id' => $request->therapist_id,
        'app_date' => $request->appdate,
        'app_from' => $request->fromtime,
        'app_to' => $request->totime,
        'type' => $request->type,
        'fees' => $request->fees,
        'created_by' => $request->patient_id,
    ]);

    return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointments)
    {
        //
    }

        /**
     * Modify the specified resource in storage.
     */
    public function modify(Request $request, Appointments $appointments)
    {
      $appid= $request->appid;
      $appstatus=$request->appstatus;

      // Validate input
    $request->validate([
        'appid' => 'required|exists:appointments,id',
        'appstatus' => 'required|integer',
    ]);

    // Fetch the appointment
    $appointments = Appointments::find($request->input('appid'));

    if (!$appointments) {
        return redirect()->back()->with('error', 'Appointment not found.');
    }

    // Update the record
    $appointments->status = $request->input('appstatus');
    $appointments->save();

    return redirect()->back()->with('success', 'Appointment updated successfully!');

    }
}
