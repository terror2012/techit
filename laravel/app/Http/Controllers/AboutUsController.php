<?php

namespace App\Http\Controllers;

use App\Eloquent\about_us;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = about_us::find('1');
        if($about_us !== null) {
            $aboutUsData['image'] = $about_us->image;
            $aboutUsData['about_us'] = $about_us->about_us;
            return view('aboutus')->with('aboutUs', $aboutUsData);
        }
        return view('aboutus');
    }
}
