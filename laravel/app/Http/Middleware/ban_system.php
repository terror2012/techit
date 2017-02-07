<?php

namespace App\Http\Middleware;

use App\Eloquent\user_info;
use Closure;
use Illuminate\Support\Facades\Auth;

class ban_system
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $id = Auth::user()->email;
            $user_info = user_info::where('email', '=', $id)->first();
            if ($user_info->status == '1') {
                return $next($request);
            } else {
                return redirect()->route('banned');
            }
        }
        return $next($request);
    }
}