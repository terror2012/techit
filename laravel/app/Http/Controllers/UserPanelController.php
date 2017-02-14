<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\queries;
use App\Eloquent\query_data;
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
        $uD = user_info::where('email', '=', Auth::user()->email)->first();
                $userData = [];
        $userData['f_name'] = $uD->first_name;
        $userData['l_name'] = $uD->last_name;
        $userData['email'] = $uD->email;
        $userData['phone'] = $uD->phone;
        $userData['contact'] = $uD->contact;
        $userData['city'] = $uD->city;
        $userData['state'] = $uD->state;
        $userData['zip'] = $uD->zip;
        $userData['street'] = $uD->address;

        $query = queries::where('user_id', '=', Auth::user()->id)->get();
        $queryData = [];
        foreach ($query as $q) {
            $queryData[$q->id]['id'] = $q->id;
            $qD = query_data::where('query_id', '=', $q->id)->first();
            $queryData[$q->id]['value'] = $qD->ammount_to_pay;
            $queryData[$q->id]['date'] = $qD->date;
            $queryData[$q->id]['time'] = $qD->time;
            $paidStatus = '';
            switch ($q->paid) {
                case 0:
                    $paidStatus = 'Not Paid';
                    break;
                case 1:
                    $paidStatus = 'Paid';
                    break;
            }
            switch($q->contact)
            {
                case 1:
                    $contact = 'email';
                    break;
                case 2:
                    $contact = 'phone';
                    break;
                case 3:
                    $contact = 'text';
                    break;
            }
            $queryData[$q->id]['contact'] = $contact;
            $queryData[$q->id]['paid'] = $paidStatus;
            $queryData[$q->id]['message'] = $q->message;
        }

        return view('my_account')->with('query', $queryData)->with('user', $userData)->with('gen', $genData);
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
