@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>

    <div class="container">
        <div class="page-layout">
            <div class="back-btn pb-5">
                <a href="{{route('patient.dashboard')}}">
                    <button class="btn btn-back">
                        Back
                    </button>
                </a>
            </div>
            <div class="page-title mb-5">
                <h1 class="pb-4">Book Appointment</h1>
            </div>
            <div class="detail-card mx-auto">
                <div class="det-upper d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center pb-4">
                        <div class="bor-der d-flex align-items-center gap-4">
                            <div class="pic">
                                <img src="{{ $currentTherapists->first()?->pfp
                                        ? asset('storage/' . $currentTherapists->first()?->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">            
                            </div>
                            <div class="info d-flex flex-column gap-2">
                                <h2>{{$currentTherapists->first()?->name}}</h2>
                                <h5>{{$currentTherapists->first()?->role}}</h5>
                                
    
                            </div>
                            
                        </div>
                        <div class="name-head d-flex flex-column gap-2">
                            <div class="d-flex gap-3">
                                <h6>Location : </h6><span>{{$currentTherapists->first()?->location}}</span>
                            </div>
                            <div class="d-flex gap-3">
                                <h6>Fees :</h6> <span>{{$currentTherapists->first()?->fees}}</span> 

                            </div>
                                    

                        </div>
                        <div class="msg-button">
                           @if($latestAppointmentscount === 0 || $latestAppointments->status!=1)
                           <button type="button" class="btn-primary rounded-pill disabled" disabled>Message Therapist</button>
                                
                            @else
                                <button type="button" class="btn-primary rounded-pill"><a href="{{ route('chat.index', ['therapist' => $id, 'patient' => $userId]) }}" class="text-white text-decoration-none">Message Therapist</a></button>
                            @endif
                        </div>
                    </div>
                
                        <div class="pic-det">
                             <div class="form">
                                
                                    <form action="{{ route('appointments.store') }}" method="POST">
                                    @csrf       
                                    <input type="hidden" name="therapist_id" value="{{$id}}">
                                    <input type="hidden" name="fees" value="{{$currentTherapists->first()?->fees}}">
                                    <input type="hidden" name="patient_id" value="{{auth()->user()->id}}">                       
                                     <div class="avail-det pt-4 d-flex flex-column gap-3">
                                        <h1 class="text-black">Book an appointment : </h1>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="d-flex flex-column gap-3">
                                                    <label class="form-label mb-0" for="date">Choose a date</label>
                                                    <input type="date" class="form-control" id="appdate" name="appdate">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="d-flex flex-column gap-3">
                                                            <label class="form-label mb-0" for="time">From</label>
                                                            <input type="time" class="form-control" id="fromtime" name="fromtime">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex flex-column gap-3">
                                                            <label class="form-label mb-0" for="time">To</label>
                                                            <input type="time" class="form-control" id="totime" name="totime">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-4">
                                                <div class="d-flex flex-column gap-3">
                                                    <label class="form-label mb-0" for="type">Therapy Type</label>
                                                    <input type="text" class="form-control" id="type" name="type" placeholder="Therapy Type">
                                                </div>
                                            </div>

                                        </div>

                                         <div class="det-mid d-flex align-items-center justify-content-center mt-4">
                                            <button type="submit" class="btn-primary rounded-pill">Send Request !</button>
                                        </div>
                                        
          
                                     </div>
        
                                 </form>
    
                             </div>
    
                        </div>
                       
                        @if(session('success'))
                            <div class="alert alert-success mt-4 mb-0" role="alert">
                                Your Request has been sent successfully!
                            </div>
                        @endif
                        <!-- <div class="alert alert-danger mt-4 mb-0" role="alert">
                            Unfortunately , this time slot has been booked by someone else . Please select a different appointment time!
                        </div> -->

                        <div class="note mt-4 text-danger">
                            Note : You can chat with the therapist only after your request has been accepted
                        </div>

                </div>


                <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Therapy Type</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($allAppointments as $allAppointment)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $allAppointment->app_date?\Carbon\Carbon::parse($allAppointment->app_date)->format('d-m-Y')    : '-' }}</td>
                                    <td>{{ $allAppointment->app_from
    ? \Carbon\Carbon::parse($allAppointment->app_from)->format('H:i')
    : '-' }}
-
{{ $allAppointment->app_to
    ? \Carbon\Carbon::parse($allAppointment->app_to)->format('H:i')
    : '-' }}</td>
                                    <td>{{$allAppointment->type}}</td>
                                    <td>@if (!is_null($allAppointment->status) && $allAppointment->status==0)
                                            <span class="text-danger">Rejected</span>
                                        @elseif ($allAppointment->status==1)
                                            <span class="text-success">Accepted</span>
                                            @else
                                            <span class="text-warning">Waiting</span>
                                        @endif
                                    </td>
                                </tr>
                                 @endforeach
                            
                                 
                        </tbody>
                    </table>

               

            </div>
        </div>
        
    </div>

@endsection