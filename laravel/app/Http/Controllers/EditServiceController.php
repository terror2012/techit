<?php

namespace App\Http\Controllers;

use App\Eloquent\service_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EditServiceController extends Controller
{
    function index()
    {
        $service = service_list::all();
        return view('admin/service')->with(compact('service'));
    }
    function edit_index($id)
    {
        $service = service_list::find($id);
        $serviceData = [];
        $serviceData['id'] = $service->id;
        $serviceData['name'] = $service->name;
        $serviceData['image'] = $service->image;
        $serviceData['link'] = $service->link;
        $serviceData['description'] = $service->description;
        $serviceData['section'] = $service->section_id;
        return view('admin/service_edit')->with('service', $serviceData);
    }
    function edit($id, Request $r)
    {
        $service = service_list::find($id);
        if(Input::has('title'))
        {
            $service->name = Input::get('title');
        }
        if(Input::hasFile('files'))
        {
            $num = $service->id . "-256x256";
            $this->uploadImage($r, $num, Input::file('files'));
            $service->image = 'img/'.$num.'.jpg';
        }
        if(Input::has('description'))
        {
            $service->description = Input::get('description');
        }
        if(Input::has('section'))
        {
            $service->section_id = Input::get('section');
        }
        if(Input::has('link'))
        {
            $service->link = Input::get('link');
        }
        $service->save();
        return redirect()->route('edit_service');


    }
    private function uploadImage(Request $r, $name, $file)
    {
            Image::make($file)->resize('256, 256')->save('img/'.$name.'.jpg');
    }
    function delete($id)
    {
        $serv = service_list::find($id);
        $serv->delete();
        return redirect()->route('edit_service');
    }
    function addIndex()
    {
        return view('admin/service_add');
    }
    function add(Request $r)
    {
        $serv = new service_list();
        if(Input::has('title')&&Input::hasFile('files')&&Input::has('description')&&Input::has('link'))
        {
            $title = Input::get('title');
            $this->uploadImage($r, $title, Input::file('files'));
            $image = 'img/'.$title.'.jpg';
            $link  = Input::get('link');
            $description = Input::get('description');
            $serv->name = $title;
            $serv->image = $image;
            if(Input::has('section'))
            {
                $serv->section_id = Input::get('section');
            }
            if(Input::has('link'))
            {
                $serv->link = $link;
            }
            $serv->description = $description;
            $serv->save();
        }
        return redirect()->route('edit_service');
    }
}
