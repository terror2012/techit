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
            $gen = general_settings::find('1');
            if($gen !== null)
            {
                $gen->first();
                if($gen->offline_mode == '1')
                {
                    return redirect()->route('offline');
                }
            }
            else
            {
                $g = new general_settings();
                $g->id = '1';
                $g->phone = '0';
                $g->email = 'test@test.com';
                $g->logo = 'img/logo.png';
                $g->rate_hour = '40';
                $g->days = 'Mon-Sat';
                $g->hours = '10AM-3PM';
                $g->initial_payment = '15';
                $g->email_on_upgrade = '1';
                $g->offline_mode = '0';
                $g->save();
                return redirect()->route('home');
            }
        return $next($request);

    }
}
