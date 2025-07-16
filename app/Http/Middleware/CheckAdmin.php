<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log; // استورد Log

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == UserRoleEnum::Admin) {
                return $next($request);
            }
            return redirect('/dashboard')->with('error', 'You do not have administrative access.');
        }
        abort(403, 'Unauthorized access. Please log in.');
        }
}
