@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="page-layout">
            <!-- <div class="back-btn pb-5">
                    <button class="btn btn-back">
                        Back
                    </button>
            </div> -->
            <div class="page-title mb-5">
                <h1 class="pb-4">Your Account</h1>
            </div>

            <div class="profile-card p-5">
                <div class="edit">
                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editmodal">
                        <img src="images/Edit.svg" alt="">
                    </button>
                </div>
                <div class="modal" id="editmodal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header page-title">
                                <h1 class="modal-title pb-3">Edit Profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                           
                            <x-slot name="header">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('Profile') }}
                                </h2>
                            </x-slot>

                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('profile.partials.update-profile-information-form')
                                        </div>
                                    </div>

                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('profile.partials.update-password-form')
                                        </div>
                                    </div>
                                    <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('profile.partials.delete-user-form')
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <!-- <div class="modal-body">
                                <form action="action_page">
                                    <div class="d-flex flex-column ">
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="name" class="form-label mb-0">Name : </label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" id="name">

                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="gen" class="form-label mb-0">Gender :</label>
                                                <select name="role" id="role" class="form-control form-select w-60">
                                                    <option value="gen">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>                      
                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="email" class="form-label mb-0">Email:</label>
                                            <input type="text" class="form-control" placeholder="Email" name="email" id="email">   
                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="ph" class="form-label mb-0">Phone No :</label>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="ph" id="ph">
                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="ph" class="form-label mb-0">Alternate Phone No :</label>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="ph" id="ph">
                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="dob" class="form-label mb-0">D.O.B :</label>
                                            <input type="date" class="form-control" placeholder="D.O.B" name="dob" id="dob">
                                        </div>
                                         <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="loc" class="form-label mb-0">Location :</label>
                                            <input type="text" class="form-control" placeholder="Location" name="loc" id="loc">
                                        </div>
                                         <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="exp" class="form-label mb-0">Experience :</label>
                                            <input type="text" class="form-control" placeholder="Experience" name="exp" id="exp">
                                        </div>
                                        <div class="mb-3 d-flex flex-column gap-2">
                                             <label for="loc" class="form-label mb-0">Profile Picture :</label>
                                            <input type="file" class="form-control" placeholder="Location" name="loc" id="loc">
                                        </div>
                                        @include('profile.partials.delete-user-form')

    
                                         <div class="regbtn text-center mt-4">
                                            <button type="submit" class="btn-primary rounded-pill">Submit</button>
                                        </div> 

                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
               <div class="d-flex align-items-center justify-content-center gap-5">
                 <div class="profile-upp d-flex flex-column align-items-center justify-content-center gap-2">
                    <div class="profile-pfp">
                        <img src="{{ auth()->user()->pfp
                                        ? asset('storage/' . auth()->user()->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                    </div>
                   <div class="info d-flex flex-column align-items-center">
                        <h2>{{ auth()->user()->name }}</h2>
                        <h5>{{ auth()->user()->role }}</h5>
                   </div>
                </div>
                <div class="profile-dets d-flex flex-column gap-3">
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>Gender : </span>
                        <span>{{ auth()->user()->gender }}</span>
                    </div>
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>Email : </span>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>Phone No : </span>
                        <span>{{ auth()->user()->phone }}</span>
                    </div>
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>Alternate Phone No : </span>
                        <span>{{ auth()->user()->altphone }}</span>
                    </div>
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>D.O.B : </span>
                        <span>{{ auth()->user()->dob }} </span>
                    </div>
                    <div class="info-wrap d-flex align-items-center gap-3">
                        <span>Location : </span>
                        <span>{{ auth()->user()->location }}</span>
                    </div>
                    @if (auth()->user()->role == 'therapist')
                        <div class="Th-details d-flex flex-column gap-3" id="Th-details">
                            <div class="info-wrap d-flex align-items-center gap-3">
                                <span>License No : </span>
                                <span>{{ auth()->user()->license }}</span>
                            </div>
                            <div class="info-wrap d-flex align-items-center gap-3">
                                <span>Specialization : </span>
                                <span>{{ auth()->user()->specialization }} </span>
                            </div>
                            <div class="info-wrap d-flex align-items-center gap-3">
                                <span>Experience : </span>
                                <span>{{ auth()->user()->experience }}</span>
                            </div>
                        </div>
                    @endif
                </div>
               </div>
            </div>
           
        </div>
        
    </div>

    <script src="{{ asset('../resources/js/jquery.min.js') }}"></script>
    <script src="{{ asset('../resources/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../resources/js/custom.js') }}"></script>

@endsection
