<?php

namespace App\Http\Controllers\auth;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class LoginController extends Controller
{
    
    public function loginForm(){

        if (Auth::check()) {
            return redirect('/dashboard'); 
        }
    
        return view('auth.login');
    }



    public function login(LoginRequest  $request) 
{
    $credentials = $request->validated();

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
        
        return redirect()->intended('/landing-page');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.'
    ]);
}

}
