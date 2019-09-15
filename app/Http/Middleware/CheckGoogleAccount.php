<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\user;

class CheckGoogleAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!empty(Auth::user()->google_id)) {
            return redirect()->back()->with('warning','Sorry You are logged in woth ur google account . You cant changed your password now');
        }
        return $next($request);
    }
}
