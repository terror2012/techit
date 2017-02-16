<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Input;

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
            $generalData['contact_img'] = $general->contact_img;
            $generalData['contact_capt'] = $general->contact_capt;
            return view('contact')->with('general', $generalData);
        }
        return view('contact');
    }
    public function contact(Mailer $mail)
    {
        $gen = general_settings::find('1')->first();
        if(Input::has('name')&&Input::has('email')&&Input::has('subject')&&Input::has('message'))
        {
            $mail->to($gen->email)
                ->send(new ContactMail(Input::get('email'), Input::get('name'), Input::get('subject'), Input::get('body')));
            flash('Message Sent Successful. We will reply to your email within 24h. Thanks for contacting us', 'success');
        }
        return redirect('/contact');
    }
}
