<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ContentManagerController extends Controller
{
    function index()
    {
        $gen = general_settings::find('1');
        $description = $gen->Description;

        return view('admin.content_manager')->with('description', $description);
    }
    function content_settings()
    {
        $gen = general_settings::find('1');
        if(Input::has('description'))
        {
            $gen->Description = Input::get('description');
            $gen->save();
            flash('Description Saved Successfully', 'info');
            return redirect()->route('manager');
        }
        return redirect()->route('manager');
    }
    function admin_info()
    {
        $usr = User::find(Auth::user()->id)->first();
        if(Input::has('email') && Input::has('password'))
        {
             $hashedPass = Hash::make(Input::get('password'));
             $usr->email = Input::get('email');
             $usr->password = $hashedPass;
             $usr->save();
             flash('Emal and Password Changed Successful', 'success');
             return redirect()->route('manager');
        }
        flash('Email or Password Fields are empty.', 'danger');
        return redirect()->route('manager');
    }
}
