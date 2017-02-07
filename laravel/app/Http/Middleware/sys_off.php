<?php

namespace App\Http\Middleware;

use App\Eloquent\general_settings;
use Closure;
use Illuminate\Support\Facades\Auth;

class sys_off
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
            $gen = general_settings::find('1')->first();
            if($gen !== null)
            {
                if($gen->offline_mode == '1')
                {
                    return redirect()->route('offline');
                }
            }
        }
        return $next($request);

    }
}
