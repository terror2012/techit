<?php

namespace App\Http\Middleware;

use App\Eloquent\general_settings;
use App\Eloquent\User;
use App\Eloquent\user_info;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            //check if at least 1 admin exists
            $usr = User::where('rank', '=', '3');
            if($usr->count() == 0)
            {
                $usr = new User();
                $usr->name = 'Admin';
                $usr->email = 'admin@admin.com';
                $usr->password = Hash::make('admin');
                $usr->rank = '3';
                $usr->status = '1';
                $usr->save();
                Auth::attempt(['email' => 'admin@admin.com', 'password' => 'admin']);
                return redirect('/');
            }

        return $next($request);

    }
}
