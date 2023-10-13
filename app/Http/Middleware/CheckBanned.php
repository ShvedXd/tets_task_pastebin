<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_banned) {


            auth()->logout();
            $message = 'Your account has been suspended. Please contact with administrator.';


            return redirect()->route('login')->withMessage($message);

        }
        return $next($request);
    }


}

