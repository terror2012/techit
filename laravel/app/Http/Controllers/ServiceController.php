<?php

namespace App\Http\Controllers;

use App\Eloquent\service_list;
use App\Eloquent\service_sections;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = service_list::all();
        $section = service_sections::all();
        $serviceInfo = [];


        if($services !== null)
        {
           foreach($services as $serv)
           {
               $serviceInfo[$serv->section_id][$serv->id]['name'] = $serv->name;
               $serviceInfo[$serv->section_id][$serv->id]['image'] = $serv->image;
               $serviceInfo[$serv->section_id][$serv->id]['description'] = $serv->description;
           }
        }
        return view('services')->with('services', $serviceInfo)->with(compact('section'));
    }
}
