@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
            <div class="page-layout">
                <div class="page-title mb-5">
                    <h1 class="pb-4">Therapist</h1>
                </div>
                <div class="row g-4 mb-5">
                    @foreach ($activeTherapists as $therapist)
                       
                         <div class="col-4">
                        <div class="cardparent">
                            <a href="{{ route('patient.book', $therapist->id) }}" class="navigate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Book This Therapist"><img src="images/arrow.svg" alt=""></a>
                        <div class="upper ">
                            <div class="active">
                                <div class="dp">
                                    <img src="{{ $therapist->pfp
                                        ? asset('storage/' . $therapist->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                                </div>
                                
                            </div>
                            <div class="name d-flex flex-column align-items-center my-3">
                                <h4> {{ $therapist->name }}</h4>
                                <h6> {{ $therapist->role }}</h6>
                            </div>
                        </div>
                        <div class="white">
                                <div class="mid">
                                    <div class="midin">
                                        <div class="content">
                                            <p>Location</p>
                                            <p>{{ $therapist->location }}</p>
                                        </div>
                                    </div>
                                    <div class="midin">
                                        <div class="content">
                                            <p>Specialization</p>
                                            <p>{{ $therapist->specialization }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower">
                                    <div>
                                        <img src="images/mark_email_unread.svg">
                                        <p>{{ $therapist->email }}</p>
                                    </div>  
                                    <div class="d-flex gap-3 ps-1">
                                        <img src="images/Phone call.svg">
                                        <p>{{ $therapist->phone }}</p>
                                    </div>  
                                </div>
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
                                    <th>Therapist</th>
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
                                    <td>{{$upcomingSess->therapist_name}}</td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>


                <div class="table-info mb-5">
                    <div class="page-title">
                        <h1 class="pb-4">Consultation History</h1>
                    </div>
                    <div>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Therapy Type</th>
                                    <th>Therapist</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($consultationHistory as $consultationHis)
                                <tr>
                                   <td>{{ $loop->iteration }}</td>
                                    <td>{{ $consultationHis->app_date?\Carbon\Carbon::parse($consultationHis->app_date)->format('d-m-Y')    : '-' }}</td>
                                    <td>{{ $consultationHis->app_from
    ? \Carbon\Carbon::parse($consultationHis->app_from)->format('H:i')
    : '-' }}
-
{{ $consultationHis->app_to
    ? \Carbon\Carbon::parse($consultationHis->app_to)->format('H:i')
    : '-' }}</td>
                                    <td>{{$consultationHis->type}}</td>
                                    <td>{{$consultationHis->therapist_name}}</td>
                                </tr>
        
                                 @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

@endsection