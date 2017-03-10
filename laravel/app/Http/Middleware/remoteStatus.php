<?php

namespace App\Http\Middleware;

use App\Eloquent\general_settings;
use Closure;

class remoteStatus
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
        $genStatus = general_settings::where('id', '=', '1')->first()->remoteStatus;
        if($genStatus == '1')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
