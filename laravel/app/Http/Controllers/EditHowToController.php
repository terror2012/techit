<?php

namespace App\Http\Controllers;

use App\Eloquent\howto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EditHowToController extends Controller
{
    function index()
    {
        $how_to = howto::all();
        return view('admin.how_to')->with(compact('how_to'));
    }
    function delete($id)
    {
        $how_to = howto::find($id);
        $id = $how_to->id;
        $how_to->delete();
        flash('How To Tutorial #' . $id . ' deleted successful', 'info');
        return redirect()->route('howTo');
    }
    function editIndex($id)
    {
        $how_to = howto::find($id)->first();
        $how_toData = [];
        $how_toData['id'] = $how_to->id;
        $how_toData['title'] = $how_to->title;
        $how_toData['youtube_url'] = $how_to->youtube_url;
        $how_toData['thumbnail'] = $how_to->thumbnail;
        $how_toData['fulltext'] = $how_to->fulltext;

        return view('admin.how_to-editor')->with('data', $how_toData);
    }
    function edit($id, Request $r)
    {
        $how_to = howto::find($id)->first();
        if(Input::has('title')&& Input::has('description'))
        {
            $how_to->title=Input::get('title');
            $how_to->author = Auth::user()->name;
            if(Input::has('link'))
            {
                $how_to->youtube_url = Input::get('link');
            }
            if(Input::hasFile('files'))
            {
                $num = 'HowTo_'.$how_to->id;
                $this->uploadImage($r, $num, Input::file('files'));
                $how_to->thumbnail = 'img/'.$num.'.jpg';
            }
            $how_to->fulltext = Input::get('description');
            $how_to->save();
        }
        flash('How_To #' . $how_to->id . ' editted successfully', 'success');
        return redirect()->route('howTo');
    }
    function addIndex()
    {
        return view('admin.add_how_to');
    }
    function add(Request $r)
    {
        $how_to = new howto();
        if(Input::has('title') && Input::hasFile('files') && Input::has('description'))
        {
            $how_to->title = Input::get('title');
            $how_to->author = Auth::user()->name;
            if(Input::has('link'))
            {
                $how_to->youtube_url = Input::get('link');
            }
            $h = howto::all()->sortByDesc('id')->first();
            if($h !== null)
            {
                $id = $h->id + 1;
            }
            else
            {
                $id = '1';
            }
            $num = 'HowTo_' . $id;
            $this->uploadImage($r, $num, Input::file('files'));
            $how_to->thumbnail = 'img/'.$num.'.jpg';
            $how_to->fulltext = Input::get('description');
            $how_to->save();
        }
        return redirect()->route('howTo');
    }

    private function uploadImage(Request $r, $name, $file)
    {
        Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
    }
}
