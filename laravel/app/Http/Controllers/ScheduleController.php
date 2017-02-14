<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\queries;
use App\Eloquent\query_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;

class ScheduleController extends Controller
{
    public function index()
    {
        $gen = general_settings::find('1');
        $genData['schedule_img'] = $gen->schedule_img;
        $genData['schedule_capt'] = $gen->schedule_capt;
        $query = queries::all();
        $queryD = query_data::all();
        $date = "";
        $days = "";
        $dayLoop = [];
        for ($i = 0 ; $i < 14; $i++)
        {
            $date = date('d, F , Y', strtotime("+" . $i . " days"));
            array_push($dayLoop,$date);
        }
        if(!$queryD->isEmpty())
        {


            $queryLoop = [];

            foreach($queryD as $q)
            {
                $queryLoop[] = $q->date;
            }
            $existsDayLoop = [];
            for($i = 0; $i < 14; $i++)
            {
                if(in_array($dayLoop[$i], $queryLoop))
                {
                    $existsDayLoop[] = $dayLoop[$i];
                }
            }
            $existsTime = [];
            for ($i = 0; $i < count($existsDayLoop); $i++)
            {
                $qur = query_data::where('date', '=', $existsDayLoop[$i])->get();
                if ($qur != null)
                {
                    foreach($qur as $q){
                        $existsTime[$existsDayLoop[$i]][] = $q->time;
                    }
                }
            }
            $DateExists = [];
            $keys=  array_keys($existsTime);
            for ($i = 0; $i < count($existsTime); $i++)
            {
                if(count($existsTime[$keys[$i]]) > 2)
                {
                    $DateExists = key($existsTime[$i]);
                }
            }

            /*$redis = Redis::connection();
            $redis->publish('business', '01:00PM');*/
            return view('schedule')->with('days', $dayLoop)->with('dayExist', $DateExists)->with('timeExist', $existsTime)->with('gen', $genData);
        }
        return view('schedule')->with('days', $dayLoop)->with('timeExist', null)->with('gen', $genData);

    }
    public function query(Request $r)
    {
        if(Input::has('firstName') && Input::has('lastName') && Input::has('email') && Input::has('phoneNumber')&&Input::has('city')&&Input::has('zip') && Input::has('street')&&Input::has('client')&&Input::has('state')&&Input::has('date')&&Input::has('time')&&Input::has('contact')&&Input::has('message'))
        {
            $fname = Input::get('firstName');
            $lname = Input::get('lastName');
            $email = Input::get('email');
            $number = Input::get('phoneNumber');
            $city = Input::get('city');
            $zip = Input::get('zip');
            $street = Input::get('street');
            $client = Input::get('client');
            $state = Input::get('state');
            $date = Input::get('date');
            $time = Input::get('time');
            $contact = Input::get('contact');
            $message = Input::get('message');

            $s = new queries();
            $sD = new query_data();

            //Schedule Inserts
            $s->name = $fname . ' ' . $lname;
            $s->email = $email;
            $s->phone = $number;
            $s->user_id = Auth::user()->id;
            $s->message = $message;
            $s->contact = $contact;
            $s->city = $city;
            $s->state = $state;
            $s->zip = $zip;
            $s->address = $street;
            $s->timestamps;
            $s->save();


            //GetQueryID
            $q = queries::all()->sortByDesc('id')->first();
            if($q !== null)
            {
                $id = $q->id +1;
            }
            else
            {
                $id = '1';
            }


            //ScheduleData
            $sD->query_id = $id;
            $sD->user_id = Auth::user()->id;
            $sD->date = $date;
            $sD->time = $time;
            $sD->ammount_to_pay = '15';
            $sD->timestamps;
            $sD->client_type = $client;
            $sD->save();

            $r->session()->put('query_id', $id);

        }
        return redirect('/account');
    }
    function reg()
    {
        //TODO REGISTER USER
    }
    function PayAsGuest()
    {
        //TODO STRIPE PAYMENT SYSTEM
    }
}
