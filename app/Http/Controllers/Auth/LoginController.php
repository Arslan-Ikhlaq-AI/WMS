<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle a login attempt.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the incoming data.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to authenticate. Auth::attempt() hashes the given
        //    password and compares it to the stored hash for us.
        //    The second argument enables "remember me" via a cookie.
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // 3. Regenerate the session ID to prevent session fixation attacks.
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // 4. Authentication failed — send the user back with an error
        //    tied to the email field (never say which field was wrong).
        return back()
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->onlyInput('email');
    }

    /**
     * Log the user out.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token so the
        // old session can't be reused.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
