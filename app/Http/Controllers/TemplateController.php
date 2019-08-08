<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function ReadTemplates(Request $request){
        $array=[];
        $templates = Template_profile::all();
        foreach(  $templates as $i){
            array_push($array,$i);

        }
        //die('ok+ '.$templates);
       return view('/Edit_Server',compact('array'));

    }
    public function Gotoadd($id){
        $client=Client::find($id);
        return view("New_Template",compact('client'));
    }
}
