<?php

namespace App\Http\Controllers;

use App\Eloquent\general_settings;
use App\Eloquent\how_section;
use App\Eloquent\howto;
use App\Http\Requests\HowToInsert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class HowToController extends Controller
{
    function index()
    {
        $how_to = howto::where('section_id', '=', '1')->get();
        $gen = general_settings::find('1');
        $genData['howto_img'] = $gen->howto_img;
        $genData['howto_capt'] = $gen->howto_capt;
        $sections = how_section::where('visible', '=', '1')->get();
        return view('howto')->with('gen', $genData)->with(compact('sections'))->with(compact('how_to'));
    }

    function ajaxRespond($id)
    {
        $how_to = howto::where('section_id', '=', $id)->get();
        if($how_to !== null)
        {
            $jsonArray = [];
            foreach($how_to as $h)
            {
                $jsonArray[$h->id]['id'] = $h->id;
                $jsonArray[$h->id]['title'] = $h->title;
                $jsonArray[$h->id]['author'] = $h->author;
                $jsonArray[$h->id]['section_id'] = $h->section_id;
                $jsonArray[$h->id]['youtube_url'] = $h->youtube_url;
                $jsonArray[$h->id]['thumbnail'] = $h->thumbnail;
                $jsonArray[$h->id]['fulltext'] = $h->fulltext;
            }
            return json_encode($jsonArray);
        }

        return null;

    }
    function submit(HowToInsert $r)
    {
        if($r->has('title')&&$r->hasfile('photo')&&$r->has('description')&&$r->has('link'))
        {
            $title = strip_tags($r->get('title'));
            $name = $this->getID() . 'ht';
            $this->uploadImage($name, $r->file('photo'));
            $photo = 'img/'.$name.'.jpg';
            $description = strip_tags($r->get('description'));
            $link = strip_tags($r->get('link'));
            $howto = new howto();
            $howto->title = $title;
            $howto->author = Auth::user()->name;
            $howto->section_id = strip_tags($r->get('sectionID'));
            $howto->thumbnail = $photo;
            $howto->fulltext = strip_tags($description);
            $howto->youtube_url = strip_tags($link);
            $howto->save();
            return redirect('/howto');
        }
        return redirect('/howto');
    }
    private function uploadImage($name, $file)
    {
        Image::make($file)->resize('256, 256')->save('img/'.$name. '.jpg');
    }
    private function getID()
    {
        $howto = howto::all()->sortByDesc('id')->first();
        if($howto !== null)
        {
            $id = $howto->id +1;
        }
        else
        {
            $id = '1';
        }
        return $id;
    }
}
