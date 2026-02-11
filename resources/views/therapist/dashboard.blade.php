@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
        <div class="page-layout">
             <div class="page-title mb-5">
                <h1 class="pb-4">Patients </h1>
            </div>
            <div class="row g-4 mb-5">
               @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            @foreach ($activeRequests as $requests)
                
           
            <div class="col-4">
                    <div class="cardparent">
                      <div class="upper ">
                          <div class="active">
                              <div class="dp">
                                  <img src="images\20180125_001_1_.jpg">
                              </div>
                              
                          </div>
                          <div class="name d-flex flex-column align-items-center my-3">
                              <h4> {{$requests->patient_name}}</h4>
                              <h6>Patient</h6>
                          </div>
                      </div>
                      <div class="white">
                              <div class="mid">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="midin">
                                            <div class="content">
                                                <p>Location</p>
                                                <p>{{$requests->patient_location}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="midin">
                                            <div class="content">
                                                <p>Therapy Type </p>
                                                <p>{{$requests->type}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="midin">
                                            <div class="content">
                                                <p>Date</p>
                                                <p>{{$requests->app_date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-6">
                                        <div class="midin">
                                            <div class="content">
                                                <p>Time</p>
                                                <p>{{$requests->app_from}} to {{$requests->app_to}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                  
                              </div>
                              <div class="lower">
                                  <div>
                                      <img src="images/mark_email_unread.svg">
                                      <p>{{$requests->patient_email}}</p>
                                  </div>  
                                  <div class="d-flex gap-3 ps-1">
                                      <img src="images/Phone call.svg">
                                      <p>{{$requests->patient_phone}}</p>
                                  </div>  
                              </div>
                      </div>
                      <div class="accept-btn d-flex justify-content-between align-items-center">
                        <div class="button-control"><button class="btn btn-dark">Message</button></div>
                        
                        <form action="{{ route('appointments.modify') }}" method="POST">
                            @csrf       
                            <input type="hidden" name="appid" value="{{$requests->id}}">
                            <input type="hidden" name="appstatus" value=0>                            
                            <div class="button-control"><button type="submit" class="btn btn-danger">Reject</button></div>
                        </form>
                       <form action="{{ route('appointments.modify') }}" method="POST">
                            @csrf       
                            <input type="hidden" name="appid" value="{{$requests->id}}">
                            <input type="hidden" name="appstatus" value=1>
                            <div class="button-control"><button type="submit" class="btn btn-success">Accept</button></div>
                        </form>
                      </div>
                    
                  </div>
                </div>

 @endforeach
                
            </div>
             <div class="table-info mb-5">
                <div class="page-title">
                    <h1 class="pb-4">Upcoming Sessions</h1>
                </div>
                <div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Therapy Type</th>
                                <th>Patient</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($upcomingSessions as $upcomingSess)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $upcomingSess->app_date?\Carbon\Carbon::parse($upcomingSess->app_date)->format('d-m-Y')    : '-' }}</td>
                                    <td>{{ $upcomingSess->app_from
    ? \Carbon\Carbon::parse($upcomingSess->app_from)->format('H:i')
    : '-' }}
-
{{ $upcomingSess->app_to
    ? \Carbon\Carbon::parse($upcomingSess->app_to)->format('H:i')
    : '-' }}</td>
                                    <td>{{$upcomingSess->type}}</td>
                                    <td>{{$upcomingSess->patient_name}}</td>
                                </tr>
                                 @endforeach
                            
                                 
                        </tbody>
                    </table>

                </div>

            </div>
           
        </div>
        
    </div>
@endsection