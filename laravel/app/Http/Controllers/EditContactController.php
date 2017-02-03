<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EditContactController extends Controller
{
    function index()
    {
        $general = general_settings::find('1');
        $generalData = [];
        $generalData['phone'] = $general->phone;
        $generalData['email'] = $general->email;
        $generalData['hours'] = $general->hours;
        $generalData['days'] = $general->days;
        return view('admin/contact_edit')->with('general', $generalData);
    }
    function changePhone()
    {
        if(Input::has('phone_edit'))
        {
            $general = general_settings::find('1');
            $general->phone = Input::get('phone_edit');
            $general->save();
            return redirect()->route('contact');
        }
        return redirect()->route('contact');
    }
    function changeEmail()
    {
        if(Input::has('email'))
        {
            $general = general_settings::find('1');
            $general->email = Input::get('email');
            $general->save();
            return redirect()->route('contact');
        }
        return redirect()->route('contact');
    }
    function changeHours()
    {
        if(Input::has('hours_edit'))
        {
            $general = general_settings::find('1');
            $general->hours = Input::get('hours_edit');
            $general->save();
            return redirect()->route('contact');
        }
        return redirect()->route('contact');
    }
    function changeDays()
    {
        if(Input::has('days_edit'))
        {
            $general = general_settings::find('1');
            $general->days = Input::get('days_edit');
            $general->save();
            return redirect()->route('contact');
        }
        return redirect()->route('contact');
    }
}
