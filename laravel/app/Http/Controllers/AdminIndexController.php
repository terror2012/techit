<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    function index()
    {
        $gen = general_settings::find('1')->remoteStatus;

        return view('admin/index')->with('status', $gen);
    }
    function enable_remote()
    {
        $gen = general_settings::find('1');
        $gen->remoteStatus = '1';
        $gen->save();
        return redirect('/admin');
    }
    function disable_remote()
    {
        $gen = general_settings::find('1');
        $gen->remoteStatus = '0';
        $gen->save();
        return redirect('/admin');
    }
}
