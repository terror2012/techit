<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use Illuminate\Http\Request;

class OfflineModeController extends Controller
{
    function index()
    {
        $gen = general_settings::find('1')->first();
        if($gen->offline_mode == '0')
        {
            return redirect()->route('home');
        }
        return view('offline_mode');
    }
}
