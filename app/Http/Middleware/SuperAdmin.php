<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        $user =  Auth::user();

        if($user->email == 'Goalhack@gmail.com')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route("access.denied");
        }


    }
}
