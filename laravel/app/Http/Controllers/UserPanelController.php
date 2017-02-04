<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserPanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gen = general_settings::find('1');
        $genData['myacc_img'] = $gen->myacc_img;
        $genData['myacc_capt'] = $gen->myacc_capt;
        return view('my_account')->with('gen', $genData);
    }
    public function edit_user_info(Request $r)
    {
        if(Input::has('InputName') && Input::has('InputSurname') && Input::has('InputEmail') && Input::has('InputPhoneNumber') && Input::has('City') && Input::has('ZipCode') && Input::has('Address'))
        {
            $name = Input::get('InputName');
            $surname = Input::get('InputSurname');
            $email = Input::get('InputEmail');
            $phone = Input::get('InputPhoneNumber');
            $city = Input::get('City');
            $zip = Input::get('ZipCode');
            $address = Input::get('Address');


            $user_info = user_info::find(Auth::user()->id);
            $user_info->first_name = $name;
            $user_info->last_name = $surname;
            $user_info->email = $email;
            $user_info->phone = $phone;
            $user_info->city = $city;
            $user_info->zip = $zip;
            $user_info->address = $address;
            $user_info->save();
            return redirect()->route('account');
        }


        return view('my_account');
    }

}
