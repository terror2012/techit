<?php

namespace App\Http\Controllers;

use App\Eloquent\queries;
use App\Eloquent\user_info;
use App\Mail\PrivateMessage;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class ClientsController extends Controller
{
    function index()
    {
        $client = user_info::all();
        return view('admin/clients')->with(compact('client'));
    }
    function message($id)
    {
        $client = user_info::find($id);
        $email = $client->email;
        return view('admin/message')->with('email', $email)->with('id', $id);
    }
    function send($id, Mailer $mail)
    {
        $client = user_info::find($id);
        $mail->to(Input::get('email'))
            ->send(new PrivateMessage(Input::get('subject'), Input::get('message')));
        flash('Congratulation, message to '.$client->first_name . ' ' . $client->last_name . ' sent successful', 'success');
        return redirect()->route('clients');
    }
    function view($id)
    {
        $clients = user_info::find($id);
        $clientInfo = [];
        $clientInfo['name'] = $clients->first_name . ' ' . $clients->last_name;
        switch($clients->contact)
        {
            case 1:
                $preference = 'email';
                break;
            case 2:
                $preference = 'phone';
                break;
            case 3:
                $preference = 'text';
                break;
        }

        $clientInfo['prefered'] = $preference;
        $clientInfo['phone'] = $clients->phone;
        $clientInfo['email'] = $clients->email;
        $clientInfo['address'] = $clients->address;


        $appointData = [];
        $appoint = queries::where('email', '=', $clients->email)->get();

        foreach($appoint as $ap)
        {
            $appointData[$ap->id]['id'] = $ap->id;
            $appointData[$ap->id]['price'] = $ap->amount;
            switch($ap->paid)
            {
                case 0:
                    $payment = 'Not Paid';
                    break;
                case 1:
                    $payment = 'Paid';
                    break;
            }
            $appointData[$ap->id]['paid'] = $payment;
            $appointData[$ap->id]['date'] = $ap->created_at->toDateString();
            $appointData[$ap->id]['time'] = $ap->created_at->toTimeString();
            $appointData[$ap->id]['issue'] = $ap->message;
        }

        return view('admin.clients_view')->with('client', $clientInfo)->with('appoint', $appointData);
    }
}
