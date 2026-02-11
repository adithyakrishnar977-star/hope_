<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {/*
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
        */
          $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt login
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        // 🔹 Role-based redirection
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
    }

    // Login failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
