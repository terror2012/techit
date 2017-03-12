<?php

namespace App\Http\Controllers;

use App\Eloquent\service_list;
use App\Eloquent\service_sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SectionController extends Controller
{
    function index()
    {
        $section = service_sections::all();
        $sectionInfo = [];
        foreach($section as $s)
        {
            $sectionInfo[$s->id]['id'] = $s->id;
            $sectionInfo[$s->id]['name'] = $s->name;
            $sectionInfo[$s->id]['visible'] = $s->visible;
            $service = service_list::where('section_id', '=', $s->id);
            $sectionInfo[$s->id]['count'] = $service->count();
        }
        return view('admin.section')->with('section', $sectionInfo);
    }
    function editIndex($id)
    {
        $section = service_sections::find($id);
        $sectionData = [];
        $sectionData['id'] = $section->id;
        $sectionData['name'] = $section->name;

        $service = service_list::where('section_id', '=', $id)->get();

        $serviceList = [];

        foreach($service as $s)
        {
            array_push($serviceList, $s->id);
        }
        $sectionData['services'] = implode(',', $serviceList);

        return view('admin.edit_section')->with('section', $sectionData);
    }
    function edit($id)
    {
        if(Input::has('name') && Input::has('services'))
        {
            $section = service_sections::find($id);
            $section->name = Input::get('name');
            $section->save();

            $serv = Input::get('services');
            $servT = trim($serv);
            $services = explode(',', $servT);
            foreach($services as $s)
            {
                $service = service_list::find($s);
                $service->section_id = $id;
                $service->save();
            }
            flash('Section Editted Successful', 'success');
            return redirect()->route('sections');
        }else
        {
            flash('Failed to Edit Section', 'danger');
        }
        return redirect()->route('sections');
    }
    function activate($id)
    {
        $section = service_sections::find($id);
        $section->visible = '1';
        $section->save();
        flash('Section ' . $section->name .' has been activated successfully', 'success');
        return redirect()->route('sections');
    }
    function deactivate($id)
    {
        $section = service_sections::find($id);
        $section->visible = '0';
        $section->save();
        flash('Section ' . $section->name .' has been deactivated successfully', 'info');
        return redirect()->route('sections');
    }
    function delete($id)
    {
        $section = service_sections::find($id);
        $section->delete();
        flash('Section ' . $section->name .' has been deleted successfully', 'success');
        return redirect()->route('sections');
    }
    function addIndex()
    {
        return view('admin.add_section');
    }
    function add()
    {
        $section = new service_sections();
        if(Input::has('name'))
        {
            $section->name = Input::get('name');
            if(Input::has('services'))
            {
                $serv = Input::get('services');
                $servT = trim($serv);
                $services = explode(',', $servT);
                foreach($services as $s)
                {
                    $service = service_list::find($s);
                    foreach($sec as $ss)
                    {
                        $service->section_id = $ss->id + 1;
                        $service->save();
                    }
                }
            }
            $section->save();
            return redirect()->route('sections');
        }
        return redirect()->route('sections');
    }
}
