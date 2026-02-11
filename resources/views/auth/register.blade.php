<x-guest-layout>
<link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.min.css') }}">
    <div class = "reg-container">
        <div class = "row m-0 h-100">
            <div class="col-3 p-0">
                <div class="left h-100">
                    <div class="bgimg h-100">
                        <img src="images/clinic_09.jpg">
                        <h1 class="text-white">REGISTER</h1>
                    </div>     
                </div>
            </div>
            <div class = "col-9 p-0">
                <div class = "right">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class = "formcontain" >
                            <h1 class="text-center mb-5">Fill this form to create an account</h1>
                            <div class="rolesel d-flex justify-content-center align-items-center gap-3">
                                <x-input-label for="role" :value="__('Choose Role')" class="form-label"/>
                                <select id="role" name="role" class="form-control form-select w-25">
                                    <option value="">Select Role</option>
                                    <option value="patient" {{ old('role') == 'patient' ? 'selected' : '' }}>Patient</option>
                                    <option value="therapist" {{ old('role') == 'therapist' ? 'selected' : '' }}>Therapist</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                            <div class = "row my-5">
                                <div class = "col-6">
                                    <div class = "leftdet">
                                        <div class = "basicdetails">
                                             <div class="mb-3">
                                                <x-input-label for="name" :value="__('Name')" />
                                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="gender" :value="__('Gender')" />
                                                <select id="gender" name="gender" class="form-control form-select w-60">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="dob" :value="__('Date of Birth')" />
                                                <x-text-input id="dob" class="form-control" type="date" name="dob" :value="old('dob')" required />
                                                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="location" :value="__('Location')" />
                                                <x-text-input id="location" class="form-control" type="text" name="location" :value="old('location')" required />
                                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="phone" :value="__('Phone Number')" />
                                                <x-text-input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')" required />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="alt_phone" :value="__('Alternate Phone Number')" />
                                                <x-text-input id="alt_phone" class="form-control" type="tel" name="alt_phone" :value="old('alt_phone')" />
                                                <x-input-error :messages="$errors->get('alt_phone')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="pfp" :value="__('Upload File')" />
                                                <x-text-input id="pfp" class="form-control" type="file" name="pfp" />
                                                <x-input-error :messages="$errors->get('pfp')" class="mt-2" />
                                            </div>                                            
                                        </div>
                                    </div>
    
                                </div>
                                <div class = "col-6">
                                    <div class = "rightdet">
                                        <div class = "basicdetails">
                                            <div class="mb-3">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="password" :value="__('Password')" />
                                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <div class="Th-details" id = "Th-details">
                                                <div class="mb-3">
                                                    <x-input-label for="license" :value="__('License Number')" />
                                                    <x-text-input id="license" class="form-control" type="text" name="license" :value="old('license')" />
                                                    <x-input-error :messages="$errors->get('license')" class="mt-2" />
                                                </div>
                                                <div class="mb-3">
                                                    <x-input-label for="specialization" :value="__('Specialization')" />
                                                    <x-text-input id="specialization" class="form-control" type="text" name="specialization" :value="old('specialization')" />
                                                    <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
                                                </div>
                                                <div class="mb-3">
                                                    <x-input-label for="experience" :value="__('Experience (Years)')" />
                                                    <x-text-input id="experience" class="form-control" type="number" name="experience" min="0" max="50" :value="old('experience')" />
                                                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                                </div>
                                                <div class="mb-3">
                                                    <x-input-label for="fees" :value="__('Fees')" />
                                                    <x-text-input id="fees" class="form-control" type="text" name="fees" :value="old('fees')" />
                                                    <x-input-error :messages="$errors->get('fees')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                        <script>
                            const roleSelect = document.getElementById('role');
                            const thDetails = document.getElementById('Th-details');

                            roleSelect.addEventListener('change', () => {
                                if(roleSelect.value === 'therapist'){
                                    thDetails.style.display = 'block';
                                } else {
                                    thDetails.style.display = 'none';
                                }
                            });
                        </script>

                    </form>    

                </div>
            </div>
        </div>
    </div>





    <!-- <form method="POST" action="{{ route('register') }}">
        @csrf



        Role Selection
        <div class="mt-4">
            <x-input-label for="role" :value="__('Choose Role')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Role</option>
                <option value="Patient" {{ old('role') == 'Patient' ? 'selected' : '' }}>Patient</option>
                <option value="Therapist" {{ old('role') == 'Therapist' ? 'selected' : '' }}>Therapist</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        Name
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        Gender
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

         Date of Birth
        <div class="mt-4">
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        Location
        <div class="mt-4">
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        Phone Number
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        Alternate Phone Number
        <div class="mt-4">
            <x-input-label for="alt_phone" :value="__('Alternate Phone Number')" />
            <x-text-input id="alt_phone" class="block mt-1 w-full" type="tel" name="alt_phone" :value="old('alt_phone')" />
            <x-input-error :messages="$errors->get('alt_phone')" class="mt-2" />
        </div>

        File Upload
        <div class="mt-4">
            <x-input-label for="myfile" :value="__('Upload File')" />
            <x-text-input id="myfile" class="block mt-1 w-full" type="file" name="myfile" />
            <x-input-error :messages="$errors->get('myfile')" class="mt-2" />
        </div>

        Email
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        Password
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        Confirm Password
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        Therapist Details (shown conditionally with JS)
        <div id="therapist-details" class="mt-4" style="display: none;">
            <h3 class="font-semibold mb-2">{{ __('Therapist Details') }}</h3>

            <div class="mt-2">
                <x-input-label for="license" :value="__('License Number')" />
                <x-text-input id="license" class="block mt-1 w-full" type="text" name="license" :value="old('license')" />
                <x-input-error :messages="$errors->get('license')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="specialization" :value="__('Specialization')" />
                <x-text-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" />
                <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="experience" :value="__('Experience (Years)')" />
                <x-text-input id="experience" class="block mt-1 w-full" type="number" name="experience" min="0" max="50" :value="old('experience')" />
                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
            </div>
        </div>

        Submit
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
   

    JS to toggle therapist fields
    <script>
        const roleSelect = document.getElementById('role');
        const thDetails = document.getElementById('therapist-details');

        roleSelect.addEventListener('change', () => {
            if(roleSelect.value === 'Therapist'){
                thDetails.style.display = 'block';
            } else {
                thDetails.style.display = 'none';
            }
        });
    </script>
    </form> -->
</x-guest-layout>
