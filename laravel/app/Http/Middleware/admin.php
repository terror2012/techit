<?php

namespace App\Http\Middleware;

use App\Eloquent\user_info;
use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
        if(Auth::check())
        {
            if(Auth::user()->rank == '3')
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('home');
            }
    }


        return redirect()->route('account');
    }
}
