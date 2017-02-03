<?php

namespace App\Http\Controllers;

use App\Eloquent\gallery;
use App\Eloquent\general_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EditGalleryController extends Controller
{
    function index()
    {
        $gallery = gallery::all();
        return view('admin.gallery_settings')->with(compact('gallery'));
    }
    function delete($id)
    {
        $gallery = gallery::find($id);
        $gallery->delete();
        flash('Slider #' . $id . ' was deleted successful', 'info');
        return redirect()->route('gallery');
    }
    function add()
    {
        $gallery = new gallery();
        $gal = gallery::all()->last();
        if($gal->isEmpty())
        {
            $id = '1';
        }
        else
        {
            $id = $gal->id + 1;
        }
        if(Input::hasFile('gallery_add')&&Input::has('slider-caption'))
        {
            $num = 'slid_' . $id;
            $this->uploadImage($num, Input::file('gallery_add'));
            $gallery->slider = 'img/'.$num.'.jpg';
            $gallery->caption = Input::get('slider-caption');
            $gallery->save();
            flash('Slider Added Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function landingChange()
    {
            $gen = general_settings::find('1');
            if(Input::has('landingTitle') && Input::has('landingDescription'))
            {
                $gen->landing_title = Input::get('landingTitle');
                $gen->landing_desc = Input::get('landingDescription');
                $gen->save();
                flash('Landing Page Info changed Successful', 'success');
                return redirect()->route('gallery');
            }
            return redirect()->route('gallery');
    }
    function aboutChange()
    {
        $gen = general_settings::find('1');
        if(Input::hasFile('about_add') && Input::has('AboutCaption'))
        {
            $num = 'About_Capt_Img';
            $this->uploadImage($num, input::file('about_add'));
            $gen->about_img = 'img/'.$num.'.jpg';
            $gen->about_capt = Input::get('aboutCaption');
            $gen->save();
            flash('About Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function commentChange()
    {

    }
    function contactChange()
    {

    }
    function howtoChange()
    {

    }
    function myaccChange()
    {

    }
    function scheduleChange()
    {

    }
    function serviceChange()
    {

    }
    private function uploadImage($name, $file)
    {
        Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
    }
}
