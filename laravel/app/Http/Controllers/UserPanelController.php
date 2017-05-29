<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\invoices;
use App\Eloquent\payment_history;
use App\Eloquent\queries;
use App\Eloquent\query_data;
use App\Eloquent\user_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Stripe\Charge;
use Stripe\Stripe;

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
        $this->middleware('admin_user');
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
            $queryData[$q->id]['date'] = Carbon::createFromFormat('d, F , Y', $qD->date)->format('d.m.y');
            $queryData[$q->id]['time'] = $qD->time;
            $paidStatus = '';
            switch ($q->paid) {
                case 0:
                    $paidStatus = false;
                    break;
                case 1:
                    $paidStatus = true;
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
            $queryData[$q->id]['message'] = str_limit($q->message, 6);
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
    function view_invoice($id)
    {
        $q = queries::where('id', '=', $id)->first();
        $queryData = [];
            $queryData['id'] = $id;
            $qD = query_data::where('query_id', '=', $id)->first();
            $queryData['value'] = $qD->ammount_to_pay;
            $queryData['date'] = $qD->date;
            $queryData['time'] = $qD->time;
            $paidStatus = '';
            $contact = '';
            switch ($q->paid) {
                case 0:
                    $paidStatus = false;
                    break;
                case 1:
                    $paidStatus = true;
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
            $queryData['contact'] = $contact;
            $queryData['paid'] = $paidStatus;
            $queryData['message'] = $q->message;
            $queryData['name'] = $q->name;


        $formD['title'] = 'Payment for ' . $q->name;
        $formD['description'] = 'Schedule Pre-Payment of ' . '$15' . ' for ' .$q->name . ' schedule';
        $formD['amount'] = '1500';
        $formD['publickey'] = env('STRIPE_KEY');


            return view('view_invoice')->with('query', $queryData)->with('formData', $formD);
    }

    function checkout(Request $r, $id)
        {
            if(Input::has('stripeToken'))
            {
                $q = queries::where('id', '=', $id)->first();
                $qD = query_data::where('query_id', '=', $id)->first();
                $token = Input::get('stripeToken');
                $fname = $q->name;
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

                //Schedule Inserts
                $q->paid = '1';
                $q->save();


                //ScheduleData
                $qD->ammount_to_pay = '0';
                $qD->save();


                $payment = new payment_history();
                $payment->user_id = Auth::user()->id;
                $payment->query_id_data = $id;
                $payment->email = Auth::user()->email;
                $payment->paid_amount = '15';
                $payment->timestamps;
                $payment->save();
                $r->session()->flash('thank', 'thankyou');
                return redirect('/thanksyou');
            }
            return redirect('/account');
        }

        function delete_invoice($id)
        {
            $invoice = queries::find($id);
            if($invoice->paid == '0')
            {
                $invoice->delete();
                $query = query_data::where('query_id', '=', $id);
                $query->delete();
            }
            else
            {
                flash("Couldn't delete appointment, already paid. Please contact the administrator regarding refund/cancel", 'danger');
                return redirect()->route('account');
            }


        }

}
