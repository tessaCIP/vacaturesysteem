<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnsureEmail2faIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('email_2fa_passed') && $request->user()) {
            return redirect()->route('email-2fa.challenge');
        }
        return $next($request);
    }
}
