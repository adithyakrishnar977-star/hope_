<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pfp'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

           
            $values=[
            'name' => $request->name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'location' => $request->location,
            'phone' => $request->phone,
            'altphone' => $request->alt_phone,
            'pfp' => $request->pfp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'license' => $request->license,
            'specialization' => $request->specialization,
            'experience' => $request->experience,
            'fees' => $request->fees,
            'role' => $request->role,




        ];
        // Handle file upload
            if ($request->hasFile('pfp')) {
                $path = $request->file('pfp')->store('pfps', 'public');
                $values['pfp'] = $path;
            }

        $user = User::create($values);

        event(new Registered($user));

        Auth::login($user);
       
        switch ($user->role) {
            case 'admin':
                return redirect()->intended('/admin');
            case 'patient':
                return redirect()->intended('/patient');
            case 'therapist':
                return redirect()->intended('/therapist');
            default:
                return redirect()->intended('/dashboard');
        }
        // return redirect(route('therapist.dashboard', absolute: false));
    }
}
