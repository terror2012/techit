<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannedPageController extends Controller
{
    function index()
    {
        if(Auth::check())
        {
            $usr_inf = user_info::where('email', '=', Auth::user()->email)->first();
            if($usr_inf->status == '1')
            {
                return redirect()->route('home');
            }
        }
        elseif(Auth::guest())
        {
            return redirect()->route('home');
        }
        $gen = general_settings::find('1')->first();
        return view('banned')->with('email', $gen->email);
    }
}
