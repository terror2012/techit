<?php

namespace App\Http\Controllers;

use App\Eloquent\about_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AboutUsEditController extends Controller
{
    function index()
    {
        $ab = about_us::find('1');
        if(!empty($ab))
        {
            $abData['image'] = $ab->image;
            $abData['description'] = $ab->about_us;
            return view('admin/about_us')->with('about', $abData);
        }
        return view('admin/about_us');

    }
    function edit()
    {
        $about = about_us::find('1');
        if($about == null)
        {
            $about = new about_us();
        }
        if(Input::has('description'))
        {
            $about->about_us = Input::get('description');
        }
        if(Input::hasfile('files'))
        {
            Image::make(Input::file('files'))->resize(320, 480)->save('img/about_us.jpg');
            $about->image = 'img/about_us.jpg';
        }
        $about->save();
        return redirect()->route('admin');
    }
}
