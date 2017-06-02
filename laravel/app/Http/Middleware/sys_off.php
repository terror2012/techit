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
