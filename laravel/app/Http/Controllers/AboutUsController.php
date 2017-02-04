<?php

namespace App\Http\Controllers;

use App\Eloquent\about_us;
use App\Eloquent\general_settings;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = about_us::find('1');
        $aboutUsData = [];
        if($about_us !== null) {
            $aboutUsData['image'] = $about_us->image;
            $aboutUsData['about_us'] = $about_us->about_us;
        }
        $gen = general_settings::find('1');
        $genData['about_img'] = $gen->about_img;
        $genData['about_capt'] = $gen->about_capt;
        return view('aboutus')->with('aboutUs', $aboutUsData)->with('gen', $genData);
    }
}
