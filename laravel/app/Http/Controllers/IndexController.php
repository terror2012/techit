<?php

namespace App\Http\Controllers;

use App\Eloquent\gallery;
use App\Eloquent\general_settings;
use App\Eloquent\service_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $count = '';
        $ActID = '';
        if(general_settings::where('name', '=', 'about_us_landing')->exists())
        {
            $generalData['about_us_landing'] = general_settings::where('name', '=', 'about_us_landing')->first()->value;
        }
        else
        {
            $general = new general_settings();
            $general->name = 'about_us_landing';
            $general->value = 'AboutUs Test Text';
            $general->save();
            $generalData['about_us_landing'] = 'AboutUs Test Text';
        }
        if(general_settings::where('name', '=', 'phone_number')->exists())
        {
            $generalData['phone_number'] = general_settings::where('name', '=', 'phone_number')->first()->value;
        }
        else
        {
            $general = new general_settings();
            $general->name = 'phone_number';
            $general->value = '(702) 907-3504';
            $general->save();
            $generalData['phone_number'] = '(702) 907-3504';
        };
        if(general_settings::where('name', '=', 'service_landing')->exists())
        {
            $generalData['service_landing'] = general_settings::where('name', '=', 'service_landing')->first()->value;
        }
        else
        {
            $general = new general_settings();
            $general->name = 'service_landing';
            $general->value = 'Lorem Service Description';
            $general->save();
            $generalData['service_landing'] = general_settings::where('name', '=', 'service_landing')->first()->value;
        }
        if(general_settings::where('name', '=', 'email')->exists())
        {
            $generalData['email'] = general_settings::where('name', '=', 'email')->first()->value;
        }
        else
        {
            $general = new general_settings();
            $general->name = 'email';
            $general->value = 'cheaptechgeeks@gmail.com';
            $general->save();
            $generalData['email'] = general_settings::where('name', '=', 'email')->first()->value;
        }

        if(general_settings::where('name', '=', 'contact_info')->exists())
        {
            $generalData['contact_info'] = explode('/n!', general_settings::where('name', '=', 'contact_info')->first()->value);
        }
        else
        {
            $general = new general_settings();
            $general->name = 'contact_info';
            $general->value = 'SCO 2C4, Sectro 20,/n! More contact Info /n! More Contact info';
            $general->save();
            $generalData['contact_info'] = explode('/n!', general_settings::where('name', '=', 'contact_info')->first()->value);
        }

        //ServiceStuff
        $services = service_list::all()->sortByDesc('id')->take('5');


        $slider = gallery::all();
        if($slider->isNotEmpty())
        {
            $count = $slider->count();
            $ActID = $slider->first()->id;
        }

        return view('index')->with('settings', $generalData)->with(compact('slider'))->with('count', $count)->with('active_id', $ActID)->with(compact('services'));
    }
}
