<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $general = general_settings::find(1);
        $generalData = [];

        if($general !== null)
        {
            $generalData['phone'] = $general->phone;
            $generalData['email'] = $general->email;
            $generalData['hours'] = $general->hours;
            $generalData['days'] = $general->days;
            return view('contact')->with('general', $generalData);
        }
        return view('contact');
    }
}
