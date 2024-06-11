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
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Check the user type and redirect accordingly
        $user = $request->user();
        switch ($user->usertype) {
            case 'admin':
                return redirect()->intended('admin/dashboard');
            case 'teacher':
                return redirect()->intended('teacher/dashboard');
            case 'user':
                return redirect()->intended('parent/dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors([
                    'email' => 'Your account does not have a valid user type.',
                ]);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
