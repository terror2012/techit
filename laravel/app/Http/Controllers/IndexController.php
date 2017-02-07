<?php

namespace App\Http\Controllers;

use App\Eloquent\gallery;
use App\Eloquent\general_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $r)
    {
        $settings = general_settings::where('id', '=', '1')->first();
        $generalData = [];
        $generalData['landing_title'] = $settings->landing_title;
        $generalData['landing_desc'] = $settings->landing_desc;
        $slider = gallery::all();
        if($slider->isNotEmpty())
        {
            $count = $slider->count();
            $Act = $slider->first();
            $ActID = $Act->id;
            return view('index')->with('settings', $generalData)->with(compact('slider'))->with('count', $count)->with('active_id', $ActID);
        }

        return view('index')->with('settings', $generalData)->with(compact('slider'));
    }
}
