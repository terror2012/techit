<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\howto;
use Illuminate\Http\Request;

class HowToController extends Controller
{
    function index()
    {
        $how_to = howto::all();
        $gen = general_settings::find('1');
        $genData['howto_img'] = $gen->howto_img;
        $genData['howto_capt'] = $gen->howto_capt;
        return view('howto')->with(compact('how_to'))->with('gen', $genData);
    }

}
