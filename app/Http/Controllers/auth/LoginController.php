<?php

namespace App\Http\Controllers\auth;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class LoginController extends Controller
{
    
    public function loginForm(Request $request){

        if (Auth::check()) {
            return redirect('/dashboard'); 
        }
    
        return view('auth.login');
    }



    public function login(Request $request) 
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->user_status !== 'active') {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Your account is ' . $user->user_status . '. You cannot login.',
            ]);
        }

        if ($user->role === UserRoleEnum::Admin) {
            return redirect()->intended('/dashboard');
        }
        
        return redirect()->intended('/landingpage');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}

    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
