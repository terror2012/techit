<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\payment_history;
use App\Eloquent\queries;
use App\Eloquent\query_data;
use App\Eloquent\Remote_Connect;
use App\Eloquent\user_info;
use App\Http\Requests\SchedulePage;
use App\Eloquent\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Stripe\Charge;
use Stripe\Stripe;

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
                    $DateExists[] = $keys[$i];
                }
            }
            return view('schedule')->with('days', $dayLoop)->with('dayExist', $DateExists)->with('timeExist', $existsTime)->with('gen', $genData);
        }
        return view('schedule')->with('days', $dayLoop)->with('timeExist', null)->with('gen', $genData);

    }
    public function query(SchedulePage $r)
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

            $query_date = query_data::where('date', '=', $date)->count();
            if($query_date > 2)
            {
                flash('Date already Exists in Database', 'danger');
                return redirect('/schedule');
            }
            $q_d = query_data::where('date', '=', $date)->get();
            $timeDataCheck = [];
            foreach($q_d as $q)
            {
                array_push($timeDataCheck, $q->time);
            }
            if(in_array($time, $timeDataCheck))
            {
                flash('Time already Exists in Database', 'danger');
                return redirect('/schedule');
            }

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
            $id = $q->id;


            //ScheduleData
            $sD->query_id = $id;
            $sD->user_id = Auth::user()->id;
            $sD->date = $date;
            $sD->time = $time;
            $sD->ammount_to_pay = '15';
            $sD->timestamps;
            $sD->client_type = $client;
            $sD->save();

            $redis = Redis::connection();
            $redis->publish('business', $date);

            return redirect('/account');
        }

        return redirect('/');

    }
    function reg(SchedulePage $r)
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

            $formDataArray = [];
            $formDataArray['firstName'] = $fname;
            $formDataArray['lastName'] = $lname;
            $formDataArray['email'] = $email;
            $formDataArray['number'] = $number;
            $formDataArray['city'] = $city;
            $formDataArray['zip'] = $zip;
            $formDataArray['street'] = $street;
            $formDataArray['client'] = $client;
            $formDataArray['state'] = $state;
            $formDataArray['date'] = $date;
            $formDataArray['time'] = $time;
            $formDataArray['contact'] = $contact;
            $formDataArray['message'] = $message;

            $r->session()->flash('formData', $formDataArray);
            $r->session()->flash('email', $email);

            return redirect('/schedule/register');
        }
        return redirect('/schedule');
    }
    function regIndex(Request $r)
    {
        $email = $r->session()->get('email');
        $r->session()->reflash();
        return view('schedule_reg')->with('email', $email);
    }
    function checkout(Request $r)
    {
        if(Input::has('stripeToken'))
        {
            $formData = $r->session()->get('formData');
            $token = Input::get('stripeToken');
                $fname = $formData['firstName'];
            Stripe::setApiKey(env('STRIPE_SECRET'));
            try
            {
                Charge::create(array(
                   "amount" => '1500',
                    "currency" => "usd",
                    "source" => $token,
                    "description" => 'Schedule Pre-Payment of' . '$15' . ' for ' . $fname . ' schedule',
                ));
            }catch(\Exception $e)
            {
                return view('payment')->with('error', $e->getMessage());
            }

            $s = new queries();
            $sD = new query_data();

            //Schedule Inserts
            $s->name = $formData['firstName'] . ' ' . $formData['lastName'];
            $s->email = $formData['email'];
            $s->phone = $formData['number'];
            $s->user_id = 'guest';
            $s->message = $formData['message'];
            $s->contact = $formData['contact'];
            $s->city = $formData['city'];
            $s->state = $formData['state'];
            $s->zip = $formData['zip'];
            $s->paid = '1';
            $s->address = $formData['street'];
            $s->timestamps;
            $s->save();


            //GetQueryID
            $q = queries::all()->sortByDesc('id')->first();
            $id = $q->id;


            //ScheduleData
            $sD->query_id = $id;
            $sD->user_id = 'guest';
            $sD->date = $formData['date'];
            $sD->time = $formData['time'];
            $sD->ammount_to_pay = '0';
            $sD->timestamps;
            $sD->client_type = $formData['client'];
            $sD->save();


            $payment = new payment_history();
            $payment->query_id_data = query_data::all()->sortByDesc('id')->first()->id;
            $payment->email = $formData['email'];
            $payment->paid_amount = '15';
            $payment->timestamps;
            $payment->save();
        $r->session()->flash('thank', 'thankyou');
        return redirect('/thanksyou');
    }
        return redirect('/schedule');
    }
    function thankyou(Request $r)
    {
        if($r->session()->has('thank'))
        {
            $id = queries::all()->sortByDesc('id')->first()->id;
            return view('thankyou')->with('id', $id)->with('type', 'query');
        }
        elseif($r->session()->has('thankR'))
        {
            $id = Remote_Connect::all()->sortByDesc('id')->first()->id;
            return view('thankyou')->with('id', $id)->with('type', 'remote');
        }
        else
        {
            return redirect('/');
        }
    }
    function PayAsGuest(Sh $r)
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

            $formDataArray = [];
            $formDataArray['firstName'] = $fname;
            $formDataArray['lastName'] = $lname;
            $formDataArray['email'] = $email;
            $formDataArray['number'] = $number;
            $formDataArray['city'] = $city;
            $formDataArray['zip'] = $zip;
            $formDataArray['street'] = $street;
            $formDataArray['client'] = $client;
            $formDataArray['state'] = $state;
            $formDataArray['date'] = $date;
            $formDataArray['time'] = $time;
            $formDataArray['contact'] = $contact;
            $formDataArray['message'] = $message;

            $r->session()->flash('formData', $formDataArray);

            $formD['title'] = 'Payment for ' . $fname;
            $formD['description'] = 'Schedule Pre-Payment of ' . '$15' . ' for ' .$fname . ' schedule';
            $formD['amount'] = '1500';
            $formD['publickey'] = env('STRIPE_KEY');

            return view('payment')->with('formData', $formD);
        }
        return redirect('/schedule');
    }
    function reg_complete(Request $r)
    {
        if(Input::has('password'))
        {

            $formData = $r->session()->get('formData');

            $pass = Hash::make(Input::get('password'));

            $user = new User();

            $user->name = $formData['firstName'] . ' ' . $formData['lastName'];
            $user->email = $formData['email'];
            $user->password = $pass;
            $user->timestamps;
            $user->save();

            $user_info = new user_info();
            $user_info->first_name = $formData['firstName'];
            $user_info->last_name = $formData['lastName'];
            $user_info->email = $formData['email'];
            $user_info->phone = $formData['number'];
            $user_info->contact = $formData['contact'];
            $user_info->city = $formData['city'];
            $user_info->state = $formData['state'];
            $user_info->zip = $formData['zip'];
            $user_info->address = $formData['street'];
            $user_info->ip_address = $r->ip();
            $user_info->save();

            Auth::attempt(['email' => $formData['email'], 'password' => Input::get('password')]);

            $s = new queries();
            $sD = new query_data();

            //Schedule Inserts
            $s->name = $formData['firstName'] . ' ' . $formData['lastName'];
            $s->email = $formData['email'];
            $s->phone = $formData['number'];
                $id_user = Auth::user()->id;
            $s->user_id = $id_user;
            $s->message = $formData['message'];
            $s->contact = $formData['contact'];
            $s->city = $formData['city'];
            $s->state = $formData['state'];
            $s->zip = $formData['zip'];
            $s->address = $formData['street'];
            $s->timestamps;
            $s->save();


            //GetQueryID
            $q = queries::all()->sortByDesc('id')->first();
            $id = $q->id;


            //ScheduleData
            $sD->query_id = $id;
            $sD->user_id = $id_user;
            $sD->date = $formData['date'];
            $sD->time = $formData['time'];
            $sD->ammount_to_pay = '15';
            $sD->timestamps;
            $sD->client_type = $formData['client'];
            $sD->save();



            return redirect('/account');
        }
        $r->session()->reflash();
        return redirect('/schedule/register');
    }
    function getDataAJAX()
    {
        $dayLoop = [];
        for ($i = 0 ; $i < 14; $i++)
        {
            $date = date('d, F , Y', strtotime("+" . $i . " days"));
            $q = query_data::where('date', '=', $date)->count();
            if($q == '3')
            {
                $day = query_data::where('date', '=', $date)->first();
                array_push($dayLoop, $day->date);
            }
        }
        $dateAjax = json_encode($dayLoop);
        return $dateAjax;
    }
    function getTimeAJAX($date)
    {
        $timeLoop = [];
        $query = query_data::where('date', '=', $date)->get();
        foreach($query as $q)
        {
            array_push($timeLoop, $q->time);
        }
        return json_encode($timeLoop);
    }
}
