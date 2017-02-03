<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $r)
    {
        $settings = general_settings::where('id', '=', '1')->first();
        $generalData = [];
        $generalData['title'] = $settings->Title;
        $generalData['description'] = $settings->Description;
        $generalData['logo'] = $settings->logo;
        $generalData['offlineMode'] = $settings->offline_mode;
        return view('index')->with('settings', $generalData);
    }
}
