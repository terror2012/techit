<?php

namespace App\Http\Controllers;

use App\Eloquent\howto;
use Illuminate\Http\Request;

class HowToController extends Controller
{
    function index()
    {
        $how_to = howto::all();
        return view('howto')->with(compact('how_to'));
    }

}
