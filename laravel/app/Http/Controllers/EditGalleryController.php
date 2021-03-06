<?php

namespace App\Http\Controllers;

use App\Eloquent\gallery;
use App\Eloquent\general_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EditGalleryController extends Controller
{
    function index()
    {
        $gallery = gallery::all();
        $gen = general_settings::find('1')->first();
        $genData = [];
        $genData['landing_title'] = $gen->landing_title;
        $genData['landing_desc'] = $gen->landing_desc;
        $genData['about_img'] = $gen->about_img;
        $genData['about_capt'] = $gen->about_capt;
        $genData['comment_img'] = $gen->comment_img;
        $genData['comment_capt'] = $gen->comment_capt;
        $genData['contact_img'] = $gen->contact_img;
        $genData['contact_capt'] = $gen->contact_capt;
        $genData['howto_img'] = $gen->howto_img;
        $genData['howto_capt'] = $gen->howto_capt;
        $genData['myacc_img'] = $gen->myacc_img;
        $genData['myacc_capt'] = $gen->myacc_capt;
        $genData['schedule_img'] = $gen->schedule_img;
        $genData['schedule_capt'] = $gen->schedule_capt;
        $genData['service_img'] = $gen->service_img;
        $genData['service_capt'] = $gen->service_capt;
        return view('admin.gallery_settings')->with(compact('gallery'))->with('g', $genData);
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
        $gal = gallery::all();
        if($gal->isEmpty())
        {
            $id = '1';
        }
        else
        {
            $gal = gallery::all()->last();
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
        if(Input::has('AboutCaption'))
        {
            $num = 'About_Capt_Img';
            if(Input::hasFile('about_add'))
            {
                $this->uploadImage($num, input::file('about_add'));
                $gen->about_img = 'img/' . $num . '.jpg';
            }
            $gen->about_capt = Input::get('AboutCaption');
            $gen->save();
            flash('About Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function commentChange() //TODO CHANGE EVERYTHING FROM ABOUT TO SECTION STUFF!
    {
        $gen = general_settings::find('1');
        if(Input::has('commCaption'))
        {
            $num = 'Comment_Capt_Img';
            if(Input::hasFile('comment_add'))
            {
                $this->uploadImage($num, input::file('comment_add'));
                $gen->comment_img = 'img/'.$num.'.jpg';
            }

            $gen->comment_capt = Input::get('commCaption');
            $gen->save();
            flash('Comment Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function contactChange()
    {
        $gen = general_settings::find('1');
        if(Input::has('contactCaption'))
        {
            $num = 'Contact_Capt_Img';
            if(Input::hasFile('contact_add'))
            {
                $this->uploadImage($num, input::file('contact_add'));
                $gen->contact_img = 'img/'.$num.'.jpg';
            }

            $gen->contact_capt = Input::get('contactCaption');
            $gen->save();
            flash('Contact Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function howtoChange()
    {
        $gen = general_settings::find('1');
        if(Input::has('HTcaption')) {
            $num = 'How_To_Capt_Img';
            if (Input::hasFile('how_to_add'))
            {
                $this->uploadImage($num, input::file('how_to_add'));
                $gen->howto_img = 'img/' . $num . '.jpg';
            }

            $gen->howto_capt = Input::get('HTcaption');
            $gen->save();
            flash('How To Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function myaccChange()
    {
        $gen = general_settings::find('1');
        if(Input::has('myAccCaption'))
        {
            $num = 'My_Account_Capt_Img';
            if(Input::hasFile('my_account_add'))
            {
                $this->uploadImage($num, input::file('my_account_add'));
                $gen->myacc_img = 'img/'.$num.'.jpg';
            }


            $gen->myacc_capt = Input::get('myAccCaption');
            $gen->save();
            flash('My Account Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function scheduleChange()
    {
        $gen = general_settings::find('1');
        if(Input::has('scheduleCaption'))
        {
            $num = 'Schedule_Capt_Img';
            if(Input::hasFile('schedule_add'))
            {
                $this->uploadImage($num, input::file('schedule_add'));
                $gen->schedule_img = 'img/'.$num.'.jpg';
            }

            $gen->schedule_capt = Input::get('scheduleCaption');
            $gen->save();
            flash('Schedule Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    function serviceChange()
    {
        $gen = general_settings::find('1');
        if(Input::has('serviceCaption'))
        {
            $num = 'Service_Capt_Img';
           if(Input::hasFile('service_add'))
           {
               $this->uploadImage($num, input::file('service_add'));
               $gen->service_img = 'img/'.$num.'.jpg';
           }

            $gen->service_capt = Input::get('serviceCaption');
            $gen->save();
            flash('Service Page Info changed Successful', 'success');
            return redirect()->route('gallery');
        }
        return redirect()->route('gallery');
    }
    private function uploadImage($name, $file)
    {
        if(!File::exists('img/'.$name.'.jpg'))
        {
            Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
        }
        else
        {
            File::delete('img/'.$name.'.jpg');
            Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
        }

    }
}
