<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\payment_history;
use App\Eloquent\Remote_Connect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stripe\Charge;
use Stripe\Stripe;

class RemoteConnectController extends Controller
{

    function index()
    {
        return view('remote_connect');
    }
    function remote(Request $r)
    {
        if($r->has('firstName') && $r->has('lastName')&&$r->has('email') && $r->has('phone'))
        {
            $firstname = $r->get('firstName');
            $lastname = $r->get('lastName');
            $email = $r->get('email');
            $phone = $r->get('phone');

            $remoteArray = [];
            $remoteArray['fName'] = $firstname;
            $remoteArray['lName'] = $lastname;
            $remoteArray['email'] = $email;
            $remoteArray['phone'] = $phone;
            if($r->has('skype'))
            {
                $remoteArray['skype'] = $r->get('skype');
            }
            $r->session()->flash('remoteArray', $remoteArray);

            return redirect('/remote_pay');
        }
        return redirect('/remote_connect');
    }
    function payment(Request $r)
    {
        $r->session()->reflash();
        $formD['title'] = 'Payment for Remote Connect';
        $formD['description'] = 'Payment of 5$ for 10 minute of remote connect';
        $formD['amount'] = '500';
        $formD['publickey'] = env('STRIPE_KEY');
        return view('remote_payment')->with('formData', $formD);
    }
    function checkout(Request $r)
    {
        if($r->has('stripeToken'))
        {
            $remoteData = $r->session()->get('remoteArray');
            $token = $r->get('stripeToken');
            $fname = $remoteData['fName'];
            Stripe::setApiKey(env('STRIPE_SECRET'));
            try
            {
                Charge::create(array(
                    "amount" => '500',
                    "currency" => "usd",
                    "source" => $token,
                    "description" => "Payment of 5$ for 10 minute of remote connect",
                ));
            }catch(\Exception $e)
            {
                return view('remote_payment')->with('error', $e->getMessage());
            }

            $payment = new payment_history();
            $payment->query_id_data = null;
            $payment->email = $remoteData['email'];
            $payment->paid_amount = '5';
            $payment->timestamps;
            $payment->save();

            $remote = new Remote_Connect();
            $remote->firstName = $fname;
            $remote->lastName = $remoteData['lName'];
            $remote->email = $remoteData['email'];
            $remote->phone = $remoteData['phone'];
            if(array_key_exists('skype', $remoteData))
            {
                $remote->skype = $remoteData['skype'];
            }
            $remote->paid = '1';
            if(Auth::check())
            {
                $remote->isRegistered = '1';
                $remote->user_id = Auth::user()->id;
            }
            $remote->save();

        $r->session()->flash('thankR', 'thankyou');
        return redirect('/thanksyou');


        }
        $r->session()->reflash();
        return redirect('/remote_pay');
    }
}
