<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    function index()
    {
        return view('admin/index');
    }
}
