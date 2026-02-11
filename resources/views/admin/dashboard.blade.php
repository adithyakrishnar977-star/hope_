@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <div class="container">
       @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        <div class="page-layout">
           <div class="admin-control">
                <ul class="nav nav-pills mb-5 d-flex align-items-center justify-content-center gap-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="therapsit-request-tab" data-bs-toggle="pill" data-bs-target="#therapsit-request" type="button" role="tab" aria-controls="pills-home" aria-selected="true">New Therapists</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="therapist-tab" data-bs-toggle="pill" data-bs-target="#therapist" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Therapists</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="patients-tab" data-bs-toggle="pill" data-bs-target="#patients" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Patients</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="app-tab" data-bs-toggle="pill" data-bs-target="#appointment" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Appointments</button>
                    </li>
                </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="therapsit-request" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">


                             <div class="table-info mb-5">
                <div class="page-title">
                    <h1 class="pb-4">Therapist Requests</h1>
                </div>
                <div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                                <th>Location</th>
                                <th>Phone No. </th>
                                <th>Alt Ph No. </th>
                                <th>Email</th>
                                <th>License No. </th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             @foreach ($allNonActiveTherapists as $allNonActiveTherapist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="table-pfp">
                                             <img src="{{ $allNonActiveTherapist->pfp
                                        ? asset('storage/' . $allNonActiveTherapist->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $allNonActiveTherapist->name}}</td>
                                <td>{{ $allNonActiveTherapist->gender}}</td>
                                <td>{{ $allNonActiveTherapist->dob?\Carbon\Carbon::parse($allNonActiveTherapist->dob)->format('d-m-Y')    : '-' }}</td>
                                <td>{{ $allNonActiveTherapist->location}}</td>
                                <td>{{ $allNonActiveTherapist->phone}}</td>
                                <td>{{ $allNonActiveTherapist->altphone}}</td>
                                <td>{{ $allNonActiveTherapist->email}}</td>
                                <td>{{ $allNonActiveTherapist->license}}</td>
                                <td>{{ $allNonActiveTherapist->specialization}}</td>
                                <td>{{ $allNonActiveTherapist->experience}}</td>
                                <td>
                                    <div class="d-flex gap-3 justify-content-center align-items-center">

                                        <form action="{{ route('admin.therapistapprove') }}" method="POST">
                                            @csrf       
                                            <input type="hidden" name="therapistid" value="{{$allNonActiveTherapist->id}}">
                                            <input type="hidden" name="appstatus" value=1>               
                                            <div class="d-flex gap-3 justify-content-center align-items-center">
                                                <div>
                                                <button type="submit" class="btn border-0 p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Accept Request"><img src="images/accept.svg" alt=""></button>
                                            </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('admin.therapistapprove') }}" method="POST">
                                            @csrf       
                                            <input type="hidden" name="therapistid" value="{{$allNonActiveTherapist->id}}">
                                            <input type="hidden" name="appstatus" value=0>          
                                            <div class="d-flex gap-3 justify-content-center align-items-center">
                                                 <div>
                                                    <button type="submit" class="btn border-0 p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reject Request"><img src="images/reject.svg" alt=""></button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                       
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>

                </div>

            </div>



                        </div>
                        <div class="tab-pane fade" id="therapist" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            
                             <div class="table-info mb-5">
                <div class="page-title">
                    <h1 class="pb-4">Therapists</h1>
                </div>
                <div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                                <th>Location</th>
                                <th>Phone No. </th>
                                <th>Alt Ph No. </th>
                                <th>Email</th>
                                <th>License No. </th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                              @foreach ($allActiveTherapists as $allActiveTherapist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="table-pfp">
                                             <img src="{{ $allActiveTherapist->pfp
                                        ? asset('storage/' . $allActiveTherapist->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $allActiveTherapist->name}}</td>
                                <td>{{ $allActiveTherapist->gender}}</td>
                                <td>{{ $allActiveTherapist->dob?\Carbon\Carbon::parse($allActiveTherapist->dob)->format('d-m-Y')    : '-' }}</td>
                                <td>{{ $allActiveTherapist->location}}</td>
                                <td>{{ $allActiveTherapist->phone}}</td>
                                <td>{{ $allActiveTherapist->altphone}}</td>
                                <td>{{ $allActiveTherapist->email}}</td>
                                <td>{{ $allActiveTherapist->license}}</td>
                                <td>{{ $allActiveTherapist->specialization}}</td>
                                <td>{{ $allActiveTherapist->experience}}</td>
                                <td>
                                    
                                    <form action="{{ route('admin.therapistdelete') }}" method="POST">
                                        @csrf       
                                        <input type="hidden" name="therapistid" value="{{$allActiveTherapist->id}}">
                                                            
                                        <div class="d-flex gap-3 justify-content-center align-items-center">
                                            <div>
                                                <button type="submit" class="btn border-0 p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Therapist"><img src="images/delete.svg" alt=""></button>
                                            </div>
                                        </div>
                                    </form>


                                    
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>



                        </div>
                        <div class="tab-pane fade" id="patients" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            
            <div class="table-info mb-5">
                <div class="page-title">
                    <h1 class="pb-4">Patients</h1>
                </div>
                <div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                                <th>Location</th>
                                <th>Phone No. </th>
                                <th>Alt Ph No. </th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                         @foreach ($allPatients as $allPatient)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="table-pfp">
                                           <img src="{{ $allPatient->pfp
                                        ? asset('storage/' . $allPatient->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $allPatient->name}}</td>
                                <td>{{ $allPatient->gender}}</td>
                                <td>{{ $allPatient->dob?\Carbon\Carbon::parse($allPatient->dob)->format('d-m-Y')    : '-' }}</td>
                                <td>{{ $allPatient->location}}</td>
                                <td>{{ $allPatient->phone}}</td>
                                <td>{{ $allPatient->altphone}}</td>
                                <td>{{ $allPatient->email}}</td>
                                <td>
                                    <form action="{{ route('admin.patientdelete') }}" method="POST">
                                        @csrf       
                                        <input type="hidden" name="patientid" value="{{$allPatient->id}}">
                                                            
                                        <div class="d-flex gap-3 justify-content-center align-items-center">
                                            <div>
                                                <button type="submit" class="btn border-0 p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Therapist"><img src="images/delete.svg" alt=""></button>
                                            </div>
                                        </div>
                                    </form>
                                </td>

                            </tr>
                         @endforeach
                            
                        </tbody>
                    </table>

                </div>

            </div>

        </div>


                        <div class="tab-pane fade" id="appointment" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="table-info mb-5">
                <div class="page-title">
                    <h1 class="pb-4">Appointments</h1>
                </div>
                <div>
                    <table class="table mt-5" id="admin-appointments">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Therapy Type</th>
                                <th>Therapist Name</th>
                                <th>Patient Name</th>
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
                                    <td>{{$upcomingSess->patient_name}}</td>
                                </tr>
                                 @endforeach
                            
                                 
                            
                             
                        </tbody>
                    </table>

                </div>

                </div>



            </div>
        </div>
    </div>
</div>
        
    </div>
    <script src="{{ asset('../resources/js/jquery.min.js') }}"></script>
    <script src="{{ asset('../resources/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../resources/js/custom.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#admin-appointments').DataTable({
             dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text: 'Export PDF',
                title: 'Users Report',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
        });
    });
</script>

@endsection