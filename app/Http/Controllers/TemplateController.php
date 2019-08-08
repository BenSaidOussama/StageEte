<?php

namespace App\Http\Controllers;
Use App\Template_profile;

use Illuminate\Http\Request;
use App\Client;

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
