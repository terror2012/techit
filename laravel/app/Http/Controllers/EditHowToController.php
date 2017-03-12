<?php

namespace App\Http\Controllers;

use App\Eloquent\how_section;
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
        $how_to = howto::find($id);
        $how_toData['id'] = $how_to->id;
        $how_toData['title'] = $how_to->title;
        $how_toData['youtube_url'] = $how_to->youtube_url;
        $how_toData['thumbnail'] = $how_to->thumbnail;
        $how_toData['fulltext'] = $how_to->fulltext;

        return view('admin.how_to-editor')->with('data', $how_toData);
    }
    function edit($id, Request $r)
    {
        $how_to = howto::find($id);
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
        if(Input::has('title') && Input::hasFile('files') && Input::has('description')&&Input::has('cat'))
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
            $how_to->section_id = Input::get('cat');
            $how_to->save();
        }
        return redirect()->route('howTo');
    }

    private function uploadImage(Request $r, $name, $file)
    {
        Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
    }

    function section()
    {
        $sections = how_section::all();
        $sectionArray = [];
        foreach($sections as $s)
        {
            $sectionArray[$s->id]['id'] = $s->id;
            $sectionArray[$s->id]['name'] = $s->name;
            $sectionArray[$s->id]['count'] = $s->HTcount;
            $sectionArray[$s->id]['visible'] = $s->visible;
            $sectionArray[$s->id]['created'] = $s->created_at->diffForHumans();
        }
        return view('admin/how_to_section')->with('section', $sectionArray);
    }
    function add_section()
    {
        $mode = 'add';
        return view('admin.howto_section_add')->with('mode', $mode);
    }
    function add_handle(Request $r)
    {
        if($r->has('name'))
        {
            $name = $r->get('name');
            $section = new how_section();
            $section->name = $name;
            $section->save();
            flash('Section ' . $name . ' added successful', 'success');
            return redirect('/admin/how_to');
        }
        return redirect('/admin_how_to/section');
    }
    function activate_section($id)
    {
        $section = how_section::where('id', '=', $id)->first();
        $section->visible = '1';
        $section->save();
        flash('Section #' . $section->id . ' changed to visible', 'success');
        return redirect('/admin/how_to/section');
    }
    function deactivate_section($id)
    {
        $section = how_section::where('id', '=', $id)->first();
        $section->visible = '0';
        $section->save();
        flash('Section #' . $section->id . ' changed to invisible', 'success');
        return redirect('/admin/how_to/section');
    }
    function edit_section($id)
    {
        $section = how_section::where('id', '=', $id)->first();
        $sectionArray['id'] = $section->id;
        $sectionArray['name'] = $section->name;
        $mode = 'edit';
        return view('admin.howto_section_add')->with('mode', $mode)->with('s', $sectionArray);
    }
    function edit_handle($id, Request $r)
    {
        if($r->has('name'))
        {
            $section = how_section::where('id', '=', $id)->first();
            $section->name = $r->get('name');
            $section->save();
            flash('Section #' . $section->id . ' saved successful', 'success');
            return redirect('/admin/how_to/section');
        }
        return redirect('/admin/how_to/section');
    }
    function delete_section($id)
    {
        $section = how_section::where('id', '=', $id)->first();
        $section->delete();

        $howto = howto::where('section_id', '=', $id)->get();
        foreach($howto as $h)
        {
            $h->delete();
        }
        flash('Section #' . $id . ' and all how_to videos related to this section were deleted', 'danger');
        return redirect('/admin/how_to/section');
    }
}
